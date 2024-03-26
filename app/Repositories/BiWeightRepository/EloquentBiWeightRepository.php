<?php

namespace App\Repositories\BiWeightRepository;

use App\Models\PiCompetence\BiWeight;

class EloquentBiWeightRepository implements BiWeightRepository
{
    public function getAll()
    {
        return BiWeight::on('mysql2')->get();
    }

    public function getById($uid)
    {
        return BiWeight::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return BiWeight::create($data);
    }

    public function update($uid, $data)
    {
        $biWeight = BiWeight::where('uid',$uid)->first();
        $biWeight->update($data);
    }

    public function delete($uid)
    {
        $biWeight = BiWeight::where('uid',$uid)->first();
        $biWeight->weights()->delete();
        $biWeight->delete();
    }
}
