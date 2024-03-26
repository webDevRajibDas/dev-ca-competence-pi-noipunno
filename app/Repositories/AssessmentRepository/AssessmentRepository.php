<?php

namespace App\Repositories\AssessmentRepository;

interface AssessmentRepository
{
    public function getAll();
    public function getDetailsById($uid);
}