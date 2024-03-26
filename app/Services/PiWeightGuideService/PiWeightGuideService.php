<?php

namespace App\Services\PiWeightGuideService;

interface PiWeightGuideService
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
}
