<?php

namespace App\Repositories\PiWeightRepository;

use App\Models\PiCompetence\PiWeight;

class EloquentPiWeightRepository implements PiWeightRepository
{
    public function getAll()
    {
        return PiWeight::on('mysql2')->get();
    }

    public function getById($uid)
    {
        return PiWeight::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return PiWeight::create($data);
    }

    public function update($uid, $data)
    {
        $piWeight = PiWeight::where('uid',$uid)->first();
        $piWeight->update($data);
    }

    public function delete($uid)
    {
        $piWeight = PiWeight::where('uid',$uid)->first();
        $piWeight->weights()->delete();
        $piWeight->delete();
    }
}
