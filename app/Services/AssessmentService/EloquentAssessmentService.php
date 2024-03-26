<?php

namespace App\Services\AssessmentService;

use App\Repositories\AssessmentRepository\AssessmentRepository;

class EloquentAssessmentService implements AssessmentService
{
    private $assessmentRepository;

    public function __construct(AssessmentRepository $assessmentRepository)
    {
        $this->assessmentRepository = $assessmentRepository;
    }
    public function getAllAssessments()
    {
        return $this->assessmentRepository->getAll();
    }

    public function getDetailsByAssessment($uid)
    {
        return $this->assessmentRepository->getDetailsById($uid);
    }

}
