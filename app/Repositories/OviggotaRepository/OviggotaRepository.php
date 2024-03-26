<?php

namespace App\Repositories\OviggotaRepository;

interface OviggotaRepository
{
    public function getAll();
    public function getAllByYear($year);
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getBySubjectId($subject_id, $year=null);
    public function getAllOviggotasByPagination($request);
    public function copyOviggotaStore($request);
}
