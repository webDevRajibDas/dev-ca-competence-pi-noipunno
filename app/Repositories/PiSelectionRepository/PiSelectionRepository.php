<?php

namespace App\Repositories\PiSelectionRepository;

interface PiSelectionRepository
{
    public function getAll();
    public function getById($uid);
    public function getBySession($session);
    public function getBySubject($data);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
}
