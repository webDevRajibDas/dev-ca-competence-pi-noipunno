<?php

namespace App\Repositories\ChapterRepository;

interface ChapterRepository
{
    public function getAll();
    public function getById($uid);
    public function create($data);
    public function update($uid, $data);
    public function delete($uid);
    public function getBySubject($subject_id);
    public function getChapterByPagination($request);
    public function copyChapterStore($request);
}
