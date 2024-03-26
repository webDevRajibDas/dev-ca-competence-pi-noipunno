<?php

namespace App\Services\OviggotaService;

interface OviggotaService
{
    public function getAllOviggotas();
    public function getAllOviggotaByYear($year);
    public function getOviggotaById($uid);
    public function createOviggota($data);
    public function updateOviggota($uid, $data);
    public function deleteOviggota($uid);
    public function getOviggotaBySubjectId($subject_id, $year=null);
    public function getAllOviggotasByPagination($request);
    public function copyOviggotaStore($request);
}
