<?php

namespace App\Services\PiSelectionForAssessmentService;

use App\Repositories\PiSelectionForAssessmentRepository\PiSelectionForAssessmentRepository;

class EloquentPiSelectionForAssessmentService implements PiSelectionForAssessmentService
{
    private $piSelectionForAssessmentRepository;

    public function __construct(PiSelectionForAssessmentRepository $piSelectionForAssessmentRepository)
    {
        $this->piSelectionForAssessmentRepository = $piSelectionForAssessmentRepository;
    }

    public function getAll()
    {
        return $this->piSelectionForAssessmentRepository->getAll();
    }

    public function getById($uid)
    {
        return $this->piSelectionForAssessmentRepository->getById($uid);
    }

    public function create($data)
    {
        return $this->piSelectionForAssessmentRepository->create($data);
    }

    public function update($uid, $data)
    {
        return $this->piSelectionForAssessmentRepository->update($uid, $data);
    }

    public function delete($uid)
    {
        return $this->piSelectionForAssessmentRepository->delete($uid);
    }
}
