<?php

namespace App\Repositories\BiRepository;

use App\Models\PiCompetence\Bi;
use App\Models\PiCompetence\BiSimilarity;
use App\Models\PiCompetence\BiWeight;
use Illuminate\Support\Facades\DB;

class EloquentBiRepository implements BiRepository
{
    public function getAll()
    {
        return Bi::on('mysql2')->with('weights')->get();
    }
    
    public function getAllByYear($year = null)
    {
        if($year){
            return Bi::on('mysql2')->with('weights')->where('session', $year)->get();
        }
        else{
            return Bi::on('mysql2')->with('weights')->where('session', date('Y'))->get();
        }
    }

    public function getById($uid)
    {
        return Bi::on('mysql2')->where('uid', $uid)->first();
    }

    public function create($data)
    {
        return Bi::create($data);
    }

    public function update($uid, $data)
    {
        $bi = Bi::where('uid', $uid)->first();
        $bi->update($data);
    }

    public function delete($uid)
    {
        $bi = Bi::where('uid', $uid)->first();
        $bi->weights()->delete();
        $bi->delete();
    }

    public function getBiSimilarById($id)
    {
        return BiSimilarity::on('mysql2')->findOrFail($id);
    }

    public function getBiSimilarAll()
    {
        return DB::table('bi_similarities')
            ->join('bis as b1', 'b1.id', '=', 'bi_similarities.bi_id')
            ->join('bis as b2', 'b2.id', '=', 'bi_similarities.similar_bi_id')
            ->select(
                'bi_similarities.id',
                'b1.id as b1_id',
                'b1.uid as b1_uid',
                'b1.bi_id as b1_bi_id',
                'b1.name_en as b1_name_en',
                'b1.name_bn as b1_name_bn',
                'b1.description as b1_description',
                'b1.competence_uid as b1_competence_uid',
                'b2.id as b2_id',
                'b2.uid as b2_uid',
                'b2.bi_id as b2_bi_id',
                'b2.name_en as b2_name_en',
                'b2.name_bn as b2_name_bn',
                'b2.description as b2_description',
                'b2.competence_uid as b2_competence_uid'
            )
            ->get();
    }

    public function getAllBisByPagination($request)
    {
        $bis = Bi::on('mysql2')->where('is_copied',0)->with('weights');

        if (!empty($request->session)) {
            $bis = $bis->where('session', $request->session);
        }else{
            $bis = $bis->where('session', date('Y')-1);
        }

        if (!empty($request->limit) && ($request->limit == 'all')) {
            $bis = $bis->get();
        } else if (!empty($request->limit)) {
            $bis = $bis->paginate($request->limit);
        } else {
            $bis = $bis->paginate(10);
        }

        return $bis;
    }

    public function copyBiStore($request)
    {
        try {
            DB::beginTransaction();

            ini_set('max_execution_time', 3600);

            $bis = Bi::on('mysql2')->with('weights')->whereIn('uid', $request->biArr)->get();

            $bisArr = [];
            if ($bis->isNotEmpty()) {
                foreach ($bis as $bi) {
                    $bisArr['bi_id']                    = $bi->bi_id;
                    $bisArr['name_en']                  = $bi->name_en;
                    $bisArr['name_bn']                  = $bi->name_bn;
                    $bisArr['description']              = $bi->description;
                    $bisArr['session']                  = date('Y');
                    $bisArr['is_copied']                = 0;

                    $biUid = Bi::create($bisArr);
                    $bi->update(['is_copied' => 1]);

                    if (!empty($bi->weights)) {
                        foreach ($bi->weights as $weight) {
                            $data               = new BiWeight();
                            $data->bi_uid       = $biUid->uid;
                            $data->weight_uid   = $weight->weight_uid;
                            $data->title_en     = $weight->title_en;
                            $data->title_bn     = $weight->title_bn;
                            $data->description  = $weight->description;
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
