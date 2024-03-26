<?php

namespace App\Repositories\DimensionRepository;

interface DimensionRepository
{
    public function getAll();
    public function getAllByYear($year);
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getBySubjectId($subject_id);
    public function getDimensionByPagination($request);
    public function copyDimensionStore($request);
}
