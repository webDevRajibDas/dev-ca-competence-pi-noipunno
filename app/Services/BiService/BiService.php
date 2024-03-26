<?php

namespace App\Services\BiService;

interface BiService
{
    public function getAllBis();
    public function getAllBisByYear($year=null);
    public function getBiById($uid);
    public function createBi($data);
    public function updateBi($uid, $data);
    public function deleteBi($uid);
    public function getBiSimilarById($id);
    public function getBiSimilarAll();
    public function getAllBisByPagination($request);
    public function copyBiStore($request);
}
