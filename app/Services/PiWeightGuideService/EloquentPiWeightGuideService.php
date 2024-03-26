<?php

namespace App\Services\PiWeightGuideService;

use App\Repositories\PiWeightGuideRepository\PiWeightGuideRepository;

class EloquentPiWeightGuideService implements PiWeightGuideService
{
    private $piWeightGuideRepository;

    public function __construct(PiWeightGuideRepository $piWeightGuideRepository)
    {
        $this->piWeightGuideRepository = $piWeightGuideRepository;
    }

    public function getAll()
    {
        return $this->piWeightGuideRepository->getAll();
    }

    public function getById($uid)
    {
        return $this->piWeightGuideRepository->getById($uid);
    }

    public function create($data)
    {
        return $this->piWeightGuideRepository->create($data);
    }

    public function update($uid, $data)
    {
        return $this->piWeightGuideRepository->update($uid, $data);
    }

    public function delete($uid)
    {
        return $this->piWeightGuideRepository->delete($uid);
    }
}
