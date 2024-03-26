<?php

namespace App\Repositories\DimensionRepository;

use App\Models\Setting\Dimension;
use Illuminate\Support\Facades\DB;

class EloquentDimensionRepository implements DimensionRepository
{
    public function getAll()
    {
        return Dimension::on('mysql2')->select('uid', 'dimension_no', 'dimension_title', 'dimension_details', 'subject_uid', 'class_id')->get();
    }
    public function getAllByYear($year)
    {
        return Dimension::on('mysql2')->select('uid', 'dimension_no', 'dimension_title', 'dimension_details', 'subject_uid', 'class_id')->where('session', $year)->get();
    }

    public function getById($uid)
    {
        return Dimension::on('mysql2')->where('uid', $uid)->first();
    }

    public function create($data)
    {
        return Dimension::create($data);
    }

    public function update($uid, $data)
    {
        $dimension = Dimension::where('uid', $uid)->first();
        $dimension->update($data);
        return $dimension;
    }

    public function delete($uid)
    {
        $dimension = Dimension::where('uid', $uid)->first();
        $dimension->delete();
    }
    public function getBySubjectId($subject_id)
    {
        return Dimension::on('mysql2')->select('uid', 'dimension_no', 'dimension_title', 'dimension_details', 'subject_uid', 'class_id')->with('pis')->where('subject_uid', $subject_id)->get();
    }


    public function getDimensionByPagination($request)
    {
        $dimensions = Dimension::on('mysql2')->where(['is_copied' => 0])->select('uid', 'dimension_no', 'dimension_title', 'dimension_details', 'subject_uid', 'class_id');

        if (!empty($request->session)) {
            $dimensions = $dimensions->where('session', $request->session);
        }else{
            $dimensions = $dimensions->where('session', date('Y')-1);
        }

        if (!empty($request->class_uid)) {
            $dimensions = $dimensions->where('class_id', $request->class_uid);
        }

        if (!empty($request->subject_uid)) {
            $dimensions = $dimensions->where('subject_uid', $request->subject_uid);
        }


        if (!empty($request->limit) && ($request->limit == 'all')) {
            $dimensions = $dimensions->get();
        } else if (!empty($request->limit)) {
            $dimensions = $dimensions->paginate($request->limit);
        } else {
            $dimensions = $dimensions->paginate(10);
        }

        return $dimensions;
    }
    public function copyDimensionStore($request)
    {
        $dimensions = Dimension::on('mysql2')->whereIn('uid', $request->dimensionArr)->get();

        if ($dimensions->isNotEmpty()) {
            DB::beginTransaction();
            try {
                $currentYear = date('Y');
                foreach ($dimensions as $dimension) {
                    Dimension::create([
                        'dimension_no'          => $dimension->dimension_no,
                        'dimension_title'       => $dimension->dimension_title,
                        'dimension_details'     => $dimension->dimension_details,
                        'session'               => $currentYear,
                        'class_id'              => $dimension->class_id,
                        'subject_uid'           => $dimension->subject_uid,
                        'is_copied'             => 0,
                    ]);
                    $dimension->update(['is_copied' => 1]);
                }
                DB::commit();
                return true;
            } catch (\Exception $e) {
                dd($e->getMessage());
                DB::rollBack();
                return false;
            }
        }
    }
}
