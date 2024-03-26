<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PiSelectionService\PiSelectionService;
use App\Services\PiService\PiService;
use App\Services\WeightService\WeightService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class PiController extends Controller
{
    use ApiResponser;
    private $piService;
    private $weightService;
    private $piSelectionService;

    public function __construct(PiService $piService, WeightService $weightService, PiSelectionService $piSelectionService)
    {
        $this->piService = $piService;
        $this->weightService = $weightService;
        $this->piSelectionService = $piSelectionService;
    }

    public function piByCompetence(Request $request)
    {
        if($request->competence_id){
            $pis = $this->piService->getAllPisByCompetence($request->competence_id);
        }

        try {
            return $this->successResponse($pis, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function piBySubject(Request $request)
    {
        if($request->subject_id){
            $pis = $this->piService->getAllPisBySubject($request->subject_id);
        }

        try {
            return $this->successResponse($pis, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function singlePi(Request $request)
    {
        if($request->pi_uid){
            $pis = $this->piService->getPiById($request->pi_uid);
        }

        try {
            return $this->successResponse($pis, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function piByChapter(Request $request)
    {
        if($request->chapter_id){
            $pis = $this->piService->getAllPisByChapter($request->chapter_id);
        }
        else{
            $pis = $this->piService->getAllPis();
        }

        try {
            return $this->successResponse($pis, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function piWeight()
    {
        $weights = $this->weightService->getAllWeights();

        try {
            return $this->successResponse($weights, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function piSelection(Request $request)
    {
        if($request->session){
            $pi_selection = $this->piSelectionService->getBySession($request->session);
        }
        else{
            $pi_selection = $this->piSelectionService->getAll();
        }

        try {
            return $this->successResponse($pi_selection, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
    public function piSelectionBySubject(Request $request)
    {
        if($request->session && $request->subject_uid){
            $pi_selection = $this->piSelectionService->getBySubject(['session'=>$request->session, 'subject_uid'=>$request->subject_uid]);
        }

        try {
            return $this->successResponse($pi_selection, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
