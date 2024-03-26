<?php

namespace App\Repositories\ClassRepository;

interface ClassRepository
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
}