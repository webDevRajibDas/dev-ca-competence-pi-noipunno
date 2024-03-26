<?php

namespace App\Repositories\BiDimensionRepository;

interface BiDimensionRepository
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getAllBiDimensionsByPagination($request);
    public function copyBiDimensionStore($request);
}
