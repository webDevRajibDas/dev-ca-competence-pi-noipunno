<?php

namespace App\Services\PiService;

interface PiService
{
    public function getAllPis();
    public function getPiById($uid);
    public function createPi($data);
    public function updatePi($uid, $data);
    public function deletePi($uid);
    public function getPiSimilerById($id);
    public function getPiSimilerAll();
    public function getAllPisByCompetence($competence_id);
    public function getAllPisBySubject($subject_id);
    public function getAllPisByChapter($chapter_id);
}
