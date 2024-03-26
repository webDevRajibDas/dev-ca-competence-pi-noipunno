<?php

namespace App\Services\WeightService;

use App\Repositories\WeightRepository\WeightRepository;

class EloquentWeightService implements WeightService
{
    private $weightRepository;

    public function __construct(WeightRepository $weightRepository)
    {
        $this->weightRepository = $weightRepository;
    }

    public function getAllWeights()
    {
        return $this->weightRepository->getAll();
    }

    public function getWeightById($uid)
    {
        return $this->weightRepository->getById($uid);
    }

    public function createWeight($data)
    {
        return $this->weightRepository->create($data);
    }

    public function updateWeight($uid, $data)
    {
        return $this->weightRepository->update($uid, $data);
    }

    public function deleteWeight($uid)
    {
        return $this->weightRepository->delete($uid);
    }
}
