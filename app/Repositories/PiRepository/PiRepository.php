<?php

namespace App\Repositories\PiRepository;

interface PiRepository
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getPiSimilerById($id);
    public function getPiSimilerAll();
    public function getAllByCompetence($competence_id);
    public function getAllBySubject($subject_id);
    public function getAllByChapter($chapter_id);
}
