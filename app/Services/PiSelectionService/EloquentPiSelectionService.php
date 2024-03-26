<?php

namespace App\Services\PiSelectionService;

use App\Repositories\PiSelectionRepository\PiSelectionRepository;

class EloquentPiSelectionService implements PiSelectionService
{
    private $piSelectionRepository;

    public function __construct(PiSelectionRepository $piSelectionRepository)
    {
        $this->piSelectionRepository = $piSelectionRepository;
    }

    public function getAll()
    {
        return $this->piSelectionRepository->getAll();
    }

    public function getById($uid)
    {
        return $this->piSelectionRepository->getById($uid);
    }

    public function getBySession($session)
    {
        return $this->piSelectionRepository->getBySession($session);
    }
    public function getBySubject($data)
    {
        return $this->piSelectionRepository->getBySubject($data);
    }

    public function create($data)
    {
        return $this->piSelectionRepository->create($data);
    }

    public function update($uid, $data)
    {
        return $this->piSelectionRepository->update($uid, $data);
    }

    public function delete($uid)
    {
        return $this->piSelectionRepository->delete($uid);
    }
}
