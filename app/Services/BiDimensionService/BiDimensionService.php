<?php

namespace App\Services\BiDimensionService;

interface BiDimensionService
{
    public function getAllBiDimensions();
    public function getBiDimensionById($uid);
    public function createBiDimension($data);
    public function updateBiDimension($uid, $data);
    public function deleteBiDimension($uid);
    public function getAllBiDimensionsByPagination($request);
    public function copyBiDimensionStore($request);
    // public function getAllDimensionsByClass($class_id);
    // public function getAllDimensionsBySubject($subject_id);
}
