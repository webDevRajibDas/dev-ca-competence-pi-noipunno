<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

use App\Http\Controllers\Controller;
use App\Services\AssessmentService\AssessmentService;
use App\Traits\ApiResponser;

class AssessmentController extends Controller
{
    use ApiResponser;
    private $assessmentService;

    public function __construct(AssessmentService $assessmentService)
    {
        $this->assessmentService = $assessmentService;
    }

    public function assessmentList(Request $request)
    {
        $assessments = $this->assessmentService->getAllAssessments();
        try {
            return $this->successResponse($assessments, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
    
    public function assessmentDetails(Request $request)
    {
        $assessments = $this->assessmentService->getDetailsByAssessment($request->assessment_id);
        try {
            return $this->successResponse($assessments, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
