<?php

namespace App\Services\DimensionService;

use App\Repositories\DimensionRepository\DimensionRepository;

class EloquentDimensionService implements DimensionService
{
    private $dimensionRepository;

    public function __construct(DimensionRepository $dimensionRepository)
    {
        $this->dimensionRepository = $dimensionRepository;
    }

    public function getAllDimensions()
    {
        return $this->dimensionRepository->getAll();
    }
    public function getAllDimensionByYear($year)
    {
        return $this->dimensionRepository->getAllByYear($year);
    }

    public function getDimensionById($uid)
    {
        return $this->dimensionRepository->getById($uid);
    }

    public function createDimension($data)
    {
        return $this->dimensionRepository->create($data);
    }

    public function updateDimension($uid, $data)
    {
        return $this->dimensionRepository->update($uid, $data);
    }

    public function deleteDimension($uid)
    {
        return $this->dimensionRepository->delete($uid);
    }

    public function getDimensionsBySubjectId($subject_id)
    {
        return $this->dimensionRepository->getBySubjectId($subject_id);
    }

    public function getDimensionByPagination($request)
    {
        return $this->dimensionRepository->getDimensionByPagination($request);
    }
    public function copyDimensionStore($request)
    {
        return $this->dimensionRepository->copyDimensionStore($request);
    }
}
