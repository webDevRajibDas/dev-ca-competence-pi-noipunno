<?php

namespace App\Services\ChapterService;

interface ChapterService
{
    public function getAllChapters();
    public function getChapterById($uid);
    public function createChapter($data);
    public function updateChapter($uid, $data);
    public function deleteChapter($uid);
    public function getChapterBySubjectId($subject_id);
    public function getChapterByPagination($request);
    public function copyChapterStore($request);
}
