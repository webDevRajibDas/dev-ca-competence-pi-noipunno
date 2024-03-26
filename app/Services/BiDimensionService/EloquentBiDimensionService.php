<?php

namespace App\Services\BiDimensionService;

use App\Repositories\BiDimensionRepository\BiDimensionRepository;

class EloquentBiDimensionService implements BiDimensionService
{
    private $bidimensionRepository;

    public function __construct(BiDimensionRepository $bidimensionRepository)
    {
        $this->bidimensionRepository = $bidimensionRepository;
    }

    public function getAllBiDimensions()
    {
        return $this->bidimensionRepository->getAll();
    }

    public function getBiDimensionById($uid)
    {
        return $this->bidimensionRepository->getById($uid);
    }

    public function createBiDimension($data)
    {
        return $this->bidimensionRepository->create($data);
    }

    public function updateBiDimension($uid, $data)
    {
        return $this->bidimensionRepository->update($uid, $data);
    }

    public function deleteBiDimension($uid)
    {
        return $this->bidimensionRepository->delete($uid);
    }

    public function getAllBiDimensionsByPagination($request){

        return $this->bidimensionRepository->getAllBiDimensionsByPagination($request);

    }
    public function copyBiDimensionStore($request){

        return $this->bidimensionRepository->copyBiDimensionStore($request);
    }

}
