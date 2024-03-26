<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CompetenceService\CompetenceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class CompetenceController extends Controller
{
    use ApiResponser;
    private $competenceService;

    public function __construct(CompetenceService $competenceService)
    {
        $this->competenceService = $competenceService;
    }

    public function competenceList()
    {
        $competences = $this->competenceService->getAllCompetences();

        try {
            return $this->successResponse($competences, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
    public function competenceByClass(Request $request)
    {
        if($request->class_id){
            $competences = $this->competenceService->getAllCompetencesByClass($request->class_id);
        }

        try {
            return $this->successResponse($competences, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
    public function competenceBySubject(Request $request)
    {
        if($request->subject_id){
            $competences = $this->competenceService->getAllCompetencesBySubject($request->subject_id);
        }

        try {
            return $this->successResponse($competences, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function competenceByClassSubject(Request $request)
    {
        if($request->class_id && $request->subject_id){
            $competences = $this->competenceService->getAllCompetencesByClassSubject($request->all());
        }

        try {
            return $this->successResponse($competences, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function competenceByChapter(Request $request)
    {
        if($request->chapter_id){
            $competences = $this->competenceService->getAllCompetencesByChapter($request->chapter_id);
        }

        try {
            return $this->successResponse($competences, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
