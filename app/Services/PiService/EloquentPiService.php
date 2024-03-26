<?php

namespace App\Services\PiService;

use App\Repositories\PiRepository\PiRepository;

class EloquentPiService implements PiService
{
    private $piRepository;

    public function __construct(PiRepository $piRepository)
    {
        $this->piRepository = $piRepository;
    }

    public function getAllPis()
    {
        return $this->piRepository->getAll();
    }

    public function getPiById($uid)
    {
        return $this->piRepository->getById($uid);
    }

    public function createPi($data)
    {
        return $this->piRepository->create($data);
    }

    public function updatePi($uid, $data)
    {
        return $this->piRepository->update($uid, $data);
    }

    public function deletePi($uid)
    {
        return $this->piRepository->delete($uid);
    }

    public function getPiSimilerById($id)
    {
        return $this->piRepository->getPiSimilerById($id);
    }

    public function getPiSimilerAll()
    {
        return $this->piRepository->getPiSimilerAll();
    }
    public function getAllPisByCompetence($competence_id)
    {
        return $this->piRepository->getAllByCompetence($competence_id);
    }
    public function getAllPisBySubject($subject_id)
    {
        return $this->piRepository->getAllBySubject($subject_id);
    }
    public function getAllPisByChapter($chapter_id)
    {
        return $this->piRepository->getAllByChapter($chapter_id);
    }
}
