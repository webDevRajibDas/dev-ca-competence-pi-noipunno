<?php

namespace App\Services\ClassService;

use App\Repositories\ClassRepository\ClassRepository;

class EloquentClassService implements ClassService
{
    private $classRepository;

    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function getAllClasses()
    {
        return $this->classRepository->getAll();
    }

    public function getClassById($uid)
    {
        return $this->classRepository->getById($uid);
    }

    public function createClass($data)
    {
        return $this->classRepository->create($data);
    }

    public function updateClass($uid, $data)
    {
        return $this->classRepository->update($uid, $data);
    }

    public function deleteClass($uid)
    {
        return $this->classRepository->delete($uid);
    }
}
