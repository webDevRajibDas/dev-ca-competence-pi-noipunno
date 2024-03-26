<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ChapterService\ChapterService;
use App\Services\SubjectService\SubjectService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class SubjectController extends Controller
{
    use ApiResponser;
    private $subjectService;
    private $chapterService;

    public function __construct(SubjectService $subjectService, ChapterService $chapterService)
    {
        $this->subjectService = $subjectService;
        $this->chapterService = $chapterService;
    }

    public function classWiseSubject(Request $request)
    {
        if ($request->class_id) {
            $subjects = $this->subjectService->getSubjectByClass($request->class_id);
        }
        else{
            $subjects = $this->subjectService->getAllSubjects();
        }

        try {
            return $this->successResponse($subjects, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
    public function subjectWiseChapter(Request $request)
    {
        if ($request->subject_id) {
            $subjects = $this->chapterService->getChapterBySubjectId($request->subject_id);
        }

        try {
            return $this->successResponse($subjects, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
