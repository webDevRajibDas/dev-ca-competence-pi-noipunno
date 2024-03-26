<?php

namespace App\Services\CompetenceService;

use App\Repositories\CompetenceRepository\CompetenceRepository;

class EloquentCompetenceService implements CompetenceService
{
    private $competenceRepository;

    public function __construct(CompetenceRepository $competenceRepository)
    {
        $this->competenceRepository = $competenceRepository;
    }

    public function getAllCompetences()
    {
        return $this->competenceRepository->getAll();
    }
    
    public function getCompetencesBySession($year)
    {
        return $this->competenceRepository->getBySession($year);
    }

    public function getCompetenceById($uid)
    {
        return $this->competenceRepository->getById($uid);
    }

    public function createCompetence($data)
    {
        return $this->competenceRepository->create($data);
    }

    public function updateCompetence($uid, $data)
    {
        return $this->competenceRepository->update($uid, $data);
    }

    public function deleteCompetence($uid)
    {
        return $this->competenceRepository->delete($uid);
    }

    public function getAllCompetencesByClass($class_id)
    {
        return $this->competenceRepository->getAllByClass($class_id);
    }
    public function getAllCompetencesBySubject($data, $year=null)
    {
        return $this->competenceRepository->getAllBySubject($data);
    }
    public function getAllCompetencesByClassSubject($data, $year=null)
    {
        return $this->competenceRepository->getAllByClassSubject($data, $year);
    }
    public function getAllCompetencesByChapter($chapter_id)
    {
        return $this->competenceRepository->getAllByChapter($chapter_id);
    }

    public function getAllCompetencesByPagination($request)
    {
        return $this->competenceRepository->getAllByPagination($request);
    }

    public function copyCompetenceStore($request){
        return $this->competenceRepository->copyCompetenceStore($request);
    }

    public function piLists($request){
        return $this->competenceRepository->piLists($request);
    }
    public function storePi($request){
        return $this->competenceRepository->storePi($request);
    }
    public function updatePi($request){
        return $this->competenceRepository->updatePi($request);
    }
    public function deletePi($request){
        return $this->competenceRepository->deletePi($request);
    }
}
