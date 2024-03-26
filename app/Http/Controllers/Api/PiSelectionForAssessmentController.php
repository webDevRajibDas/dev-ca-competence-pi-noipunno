<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PiSelectionForAssessmentService\PiSelectionForAssessmentService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class PiSelectionForAssessmentController extends Controller
{
    use ApiResponser;
    private $piSelectionForAssessmentService;

    public function __construct(PiSelectionForAssessmentService $piSelectionForAssessmentService)
    {
        $this->piSelectionForAssessmentService = $piSelectionForAssessmentService;
    }

    public function index()
    {
        try {
            $pis = $this->piSelectionForAssessmentService->getAll();
            return $this->successResponse($pis, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $this->piSelectionForAssessmentService->create($request->all());
            return $this->successResponse($data, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function edit($uid)
    {
        try {
            $data = $this->piSelectionForAssessmentService->getById($uid);
            return $this->successResponse($data, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $uid)
    {
        try {
            $data = $this->piSelectionForAssessmentService->update($uid, $request->all());
            return $this->successResponse($data, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
