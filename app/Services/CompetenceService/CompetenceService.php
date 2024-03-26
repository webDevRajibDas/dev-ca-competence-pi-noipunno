<?php

namespace App\Services\CompetenceService;

interface CompetenceService
{
    public function getAllCompetences();
    public function getCompetencesBySession($year);
    public function getAllCompetencesByPagination($request);
    public function copyCompetenceStore($request);
    public function getCompetenceById($uid);
    public function createCompetence($data);
    public function updateCompetence($uid, $data);
    public function deleteCompetence($uid);

    public function getAllCompetencesByClass($class_id);
    public function getAllCompetencesBySubject($subject_id, $year=null);
    public function getAllCompetencesByClassSubject($data, $year=null);
    public function getAllCompetencesByChapter($chapter_id);


    //Those method used for Pi CRUD
    public function piLists($request);
    public function storePi($request);
    public function updatePi($request);
    public function deletePi($request);
    //Those method used for Pi CRUD
}
