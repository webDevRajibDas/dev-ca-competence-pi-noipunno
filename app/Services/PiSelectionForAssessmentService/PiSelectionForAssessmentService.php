<?php

namespace App\Services\PiSelectionForAssessmentService;

interface PiSelectionForAssessmentService
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);

}
