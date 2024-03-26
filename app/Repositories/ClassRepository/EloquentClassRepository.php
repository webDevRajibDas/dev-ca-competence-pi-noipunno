<?php

namespace App\Repositories\ClassRepository;

use App\Models\Setting\PiClass;

class EloquentClassRepository implements ClassRepository
{
    public function getAll()
    {
        return PiClass::on('mysql2')->select('uid', 'class_id', 'name_en', 'name_bn', 'version')->get();
    }

    public function getById($uid)
    {
        return PiClass::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        return PiClass::create($data);
    }

    public function update($uid, $data)
    {
        $piClass = PiClass::where('uid',$uid)->first();
        $piClass->update($data);
    }

    public function delete($uid)
    {
        $piClass = PiClass::where('uid',$uid)->first();
        $piClass->delete();
    }
}
