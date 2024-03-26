<?php

namespace App\Services\DimensionService;

interface DimensionService
{
    public function getAllDimensions();
    public function getAllDimensionByYear($year);
    public function getDimensionById($uid);
    public function createDimension($data);
    public function updateDimension($uid, $data);
    public function deleteDimension($uid);
    public function getDimensionsBySubjectId($subject_id);
    public function getDimensionByPagination($request);
    public function copyDimensionStore($request);
    // public function getAllDimensionsByClass($class_id);
    // public function getAllDimensionsBySubject($subject_id);
}
