<?php

namespace App\Repositories\PiRepository;

use App\Models\PiCompetence\Pi;
use App\Models\PiCompetence\PiSimilarity;
use Illuminate\Support\Facades\DB;

class EloquentPiRepository implements PiRepository
{
    public function getAll()
    {
        return Pi::on('mysql2')->get();
    }
    public function getAllByCompetence($competence_id)
    {
        return Pi::on('mysql2')->where('competence_uid', $competence_id)->get();
    }
    public function getAllBySubject($subject_id)
    {
        return Pi::on('mysql2')->with('competence')->whereHas('competence', function($q) use($subject_id){
            $q->where('subject_uid', $subject_id)->where('session', date('Y'));
        })->get();
    }
    public function getAllByChapter($chapter_id)
    {
        return Pi::on('mysql2')->where('chapter_uid', $chapter_id)->get();
    }

    public function getById($uid)
    {
        return Pi::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return Pi::create($data);
    }

    public function update($uid, $data)
    {
        $pi = Pi::where('uid',$uid)->first();
        return $pi->update($data);
    }

    public function delete($uid)
    {
        $pi = Pi::where('uid',$uid)->first();
        $pi->delete();
    }

    public function getPiSimilerById($id)
    {
        return PiSimilarity::on('mysql2')->findOrFail($id);
    }

    public function getPiSimilerAll()
    {
        return DB::table('pi_similarities')
        ->join('pis as p1', 'p1.id', '=', 'pi_similarities.pi_id')
        ->join('pis as p2', 'p2.id', '=', 'pi_similarities.similar_pi_id')
        ->select(
            'pi_similarities.id',
            'p1.id as p1_id',
            'p1.uid as p1_uid',
            'p1.pi_id as p1_pi_id',
            'p1.name_en as p1_name_en',
            'p1.name_bn as p1_name_bn',
            'p1.description as p1_description',
            'p1.competence_uid as p1_competence_uid',
            'p2.id as p2_id',
            'p2.uid as p2_uid',
            'p2.pi_id as p2_pi_id',
            'p2.name_en as p2_name_en',
            'p2.name_bn as p2_name_bn',
            'p2.description as p2_description',
            'p2.competence_uid as p2_competence_uid'
        )
        ->get();
    }
}
