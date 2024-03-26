<?php

namespace App\Repositories\BiDimensionRepository;

use App\Models\BiDimension;
use App\Models\BiDimensionToBi;
use Illuminate\Support\Facades\DB;

class EloquentBiDimensionRepository implements BiDimensionRepository
{
    public function getAll()
    {
        return BiDimension::on('mysql2')->get();
        // return BiDimension::on('mysql2')->with('bi_dimension')->get();
    }

    public function getById($uid)
    {
        return BiDimension::on('mysql2')->where('uid', $uid)->first();
    }

    public function create($data)
    {
        return BiDimension::create($data);
    }

    public function update($uid, $data)
    {
        $dimension = BiDimension::where('uid', $uid)->first();
        $dimension->update($data);
        return $dimension;
    }

    public function delete($uid)
    {
        $dimension = BiDimension::where('uid', $uid)->first();
        $dimension->delete();
    }

    public function getAllBiDimensionsByPagination($request)
    {
        $biDimensions = BiDimension::on('mysql2')->where('is_copied',0);

        if (!empty($request->session)) {
            $biDimensions = $biDimensions->where('session', $request->session);
        }else{
            $biDimensions = $biDimensions->where('session', date('Y')-1);
        }

        if (!empty($request->limit) && ($request->limit == 'all')) {
            $biDimensions = $biDimensions->get();
        } else if (!empty($request->limit)) {
            $biDimensions = $biDimensions->paginate($request->limit);
        } else {
            $biDimensions = $biDimensions->paginate(10);
        }

        return $biDimensions;
    }

    public function copyBiDimensionStore($request)
    {

        try {
            DB::beginTransaction();

            ini_set('max_execution_time', 3600);

            $biDimensions = BiDimension::on('mysql2')->with('bis')->whereIn('uid', $request->biDimensionArr)->get();

            // dd($bis->toArray());

            $bisDimensionArr = [];
            if ($biDimensions->isNotEmpty()) {
                foreach ($biDimensions as $biDimension) {
                    $bisDimensionArr['dimension_no']             = $biDimension->dimension_no;
                    $bisDimensionArr['dimension_title']          = $biDimension->dimension_title;
                    $bisDimensionArr['dimension_details']        = $biDimension->dimension_details;
                    $bisDimensionArr['session']                  = date('Y');
                    $bisDimensionArr['is_copied']                = 0;

                    $biDimensionUid = BiDimension::create($bisDimensionArr);
                    $biDimension->update(['is_copied' => 1]);

                    if (!empty($biDimension->bis)) {
                        foreach ($biDimension->bis as $bi) {
                            $data               = new BiDimensionToBi();
                            $data->bi_dimension_uid       = $biDimensionUid->uid;
                            $data->bi_uid                 = $bi->bi_uid;
                            $data->save();
                        }
                    }
                }

                DB::commit();
                return true;
            }
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
