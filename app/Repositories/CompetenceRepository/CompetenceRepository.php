<?php

namespace App\Repositories\CompetenceRepository;

interface CompetenceRepository
{
    public function getAll();
    public function getBySession($year);
    public function getAllByPagination($request);
    public function copyCompetenceStore($request);
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getAllByClass($class_id);
    public function getAllBySubject($data, $year=null);
    public function getAllByClassSubject($data, $year=null);
    public function getAllByChapter($id);
    public function piLists($request);
    public function storePi($request);
    public function updatePi($request);
    public function deletePi($request);
}
