<?php

namespace App\Services\OviggotaService;

use App\Repositories\OviggotaRepository\OviggotaRepository;

class EloquentOviggotaService implements OviggotaService
{
    private $oviggotaRepository;
    
    public function __construct(OviggotaRepository $oviggotaRepository)
    {
        $this->oviggotaRepository = $oviggotaRepository;
    }
    
    public function getAllOviggotas()
    {
        return $this->oviggotaRepository->getAll();
    }
    public function getAllOviggotaByYear($year)
    {
        return $this->oviggotaRepository->getAllByYear($year);
    }
    
    public function getOviggotaById($uid)
    {
        return $this->oviggotaRepository->getById($uid);
    }

    public function createOviggota($data)
    {
        return $this->oviggotaRepository->create($data);
    }

    public function updateOviggota($uid, $data)
    {
        return $this->oviggotaRepository->update($uid, $data);
    }

    public function deleteOviggota($uid)
    {
        return $this->oviggotaRepository->delete($uid);
    }
    
    public function getOviggotaBySubjectId($subject_id, $year=null)
    {
        return $this->oviggotaRepository->getBySubjectId($subject_id, $year);
    }

    public function getAllOviggotasByPagination($request)
    {

        return $this->oviggotaRepository->getAllOviggotasByPagination($request);
    }

    public function copyOviggotaStore($request)
    {
        return $this->oviggotaRepository->copyOviggotaStore($request);
    }
}
