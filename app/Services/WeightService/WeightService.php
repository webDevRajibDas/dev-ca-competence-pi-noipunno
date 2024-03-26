<?php

namespace App\Services\WeightService;

interface WeightService
{
    public function getAllWeights();
    public function getWeightById($uid);
    public function createWeight($data);
    public function updateWeight($uid, $data);
    public function deleteWeight($uid);
}