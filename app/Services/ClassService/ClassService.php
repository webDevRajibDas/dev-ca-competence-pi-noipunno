<?php

namespace App\Services\ClassService;

interface ClassService
{
    public function getAllClasses();
    public function getClassById($id);
    public function createClass($data);
    public function updateClass($id, $data);
    public function deleteClass($id);
}