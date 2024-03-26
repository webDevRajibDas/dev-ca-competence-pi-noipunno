<?php

namespace App\Services\SubjectService;

interface SubjectService
{
    public function getAllSubjects();
    public function getSubjectById($uid);
    public function createSubject($data);
    public function updateSubject($uid, $data);
    public function deleteSubject($uid);
    public function getSubjectByClass($class_uid);
}
