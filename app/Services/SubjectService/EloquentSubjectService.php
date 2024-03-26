<?php

namespace App\Services\SubjectService;

use App\Repositories\SubjectRepository\SubjectRepository;

class EloquentSubjectService implements SubjectService
{
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAllSubjects()
    {
        return $this->subjectRepository->getAll();
    }

    public function getSubjectById($uid)
    {
        return $this->subjectRepository->getById($uid);
    }

    public function createSubject($data)
    {
        return $this->subjectRepository->create($data);
    }

    public function updateSubject($uid, $data)
    {
        return $this->subjectRepository->update($uid, $data);
    }

    public function deleteSubject($uid)
    {
        return $this->subjectRepository->delete($uid);
    }

    public function getSubjectByClass($class_uid)
    {
        return $this->subjectRepository->getByClass($class_uid);
    }


}
