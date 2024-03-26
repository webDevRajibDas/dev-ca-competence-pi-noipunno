<?php

namespace App\Services\AssessmentService;

interface AssessmentService
{
    public function getAllAssessments();
    public function getDetailsByAssessment($id);
}