<?php

namespace App\Services\BiWeightService;

use App\Repositories\BiWeightRepository\BiWeightRepository;

class EloquentBiWeightService implements BiWeightService
{
    private $biWeightRepository;

    public function __construct(BiWeightRepository $biWeightRepository)
    {
        $this->biWeightRepository = $biWeightRepository;
    }

    public function getAll()
    {
        return $this->biWeightRepository->getAll();
    }

    public function getById($uid)
    {
        return $this->biWeightRepository->getById($uid);
    }

    public function create($data)
    {
        return $this->biWeightRepository->create($data);
    }

    public function update($uid, $data)
    {
        return $this->biWeightRepository->update($uid, $data);
    }

    public function delete($uid)
    {
        return $this->biWeightRepository->delete($uid);
    }
}
