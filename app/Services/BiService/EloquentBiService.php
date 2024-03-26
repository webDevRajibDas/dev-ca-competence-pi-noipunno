<?php

namespace App\Services\BiService;

use App\Repositories\BiRepository\BiRepository;

class EloquentBiService implements BiService
{
    private $biRepository;

    public function __construct(BiRepository $biRepository)
    {
        $this->biRepository = $biRepository;
    }

    public function getAllBis()
    {
        return $this->biRepository->getAll();
    }
    
    public function getAllBisByYear($year=null)
    {
        return $this->biRepository->getAllByYear($year);
    }
    
    public function getBiById($uid)
    {
        return $this->biRepository->getById($uid);
    }

    public function createBi($data)
    {
        return $this->biRepository->create($data);
    }

    public function updateBi($uid, $data)
    {
        return $this->biRepository->update($uid, $data);
    }

    public function deleteBi($uid)
    {
        return $this->biRepository->delete($uid);
    }

    public function getBiSimilarById($id)
    {
        return $this->biRepository->getBiSimilarById($id);
    }

    public function getBiSimilarAll()
    {
        return $this->biRepository->getBiSimilarAll();
    }

    public function getAllBisByPagination($request){
        return $this->biRepository->getAllBisByPagination($request);
    }
    public function copyBiStore($request){
        return $this->biRepository->copyBiStore($request);
    }
}
