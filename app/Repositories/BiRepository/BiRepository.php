<?php

namespace App\Repositories\BiRepository;

interface BiRepository
{
    public function getAll();
    public function getAllByYear($year=null);
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getBiSimilarById($id);
    public function getBiSimilarAll();
    public function getAllBisByPagination($request);
    public function copyBiStore($request);
}
