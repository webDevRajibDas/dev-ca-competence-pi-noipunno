<?php

namespace App\Repositories\PiWeightGuideRepository;

use App\Models\PiCompetence\PiWeightGuideline;
;

class EloquentPiWeightGuideRepository implements PiWeightGuideRepository
{
    public function getAll()
    {
        return PiWeightGuideline::on('mysql2')->get();
    }

    public function getById($uid)
    {
        return PiWeightGuideline::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return PiWeightGuideline::create($data);
    }

    public function update($uid, $data)
    {
        $piWeightGuide = PiWeightGuideline::where('uid',$uid)->first();
        $piWeightGuide->update($data);
    }

    public function delete($uid)
    {
        $piWeightGuide = PiWeightGuideline::where('uid',$uid)->first();
        $piWeightGuide->delete();
    }
}
