<?php

namespace App\Repositories\SubjectRepository;

interface SubjectRepository
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getByClass($class_uid);
}
