<?php

namespace App\Services\PiWeightService;

use App\Repositories\PiWeightRepository\PiWeightRepository;

class EloquentPiWeightService implements PiWeightService
{
    private $piWeightRepository;

    public function __construct(PiWeightRepository $piWeightRepository)
    {
        $this->piWeightRepository = $piWeightRepository;
    }

    public function getAll()
    {
        return $this->piWeightRepository->getAll();
    }

    public function getById($uid)
    {
        return $this->piWeightRepository->getById($uid);
    }

    public function create($data)
    {
        return $this->piWeightRepository->create($data);
    }

    public function update($uid, $data)
    {
        return $this->piWeightRepository->update($uid, $data);
    }

    public function delete($uid)
    {
        return $this->piWeightRepository->delete($uid);
    }
}
