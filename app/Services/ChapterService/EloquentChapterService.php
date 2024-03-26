<?php

namespace App\Services\ChapterService;

use App\Repositories\ChapterRepository\ChapterRepository;

class EloquentChapterService implements ChapterService
{
    private $chapterRepository;

    public function __construct(ChapterRepository $chapterRepository)
    {
        $this->chapterRepository = $chapterRepository;
    }

    public function getAllChapters()
    {
        return $this->chapterRepository->getAll();
    }

    public function getChapterById($uid)
    {
        return $this->chapterRepository->getById($uid);
    }

    public function createChapter($data)
    {
        return $this->chapterRepository->create($data);
    }

    public function updateChapter($uid, $data)
    {
        return $this->chapterRepository->update($uid, $data);
    }

    public function deleteChapter($uid)
    {
        return $this->chapterRepository->delete($uid);
    }

    public function getChapterBySubjectId($subject_id)
    {
        return $this->chapterRepository->getBySubject($subject_id);
    }
    public function getChapterByPagination($request)
    {
        return $this->chapterRepository->getChapterByPagination($request);
    }
    public function copyChapterStore($request)
    {
        return $this->chapterRepository->copyChapterStore($request);
    }
}
