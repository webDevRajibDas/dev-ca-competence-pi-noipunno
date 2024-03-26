<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BiService\BiService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class BiController extends Controller
{
    use ApiResponser;
    private $biService;

    public function __construct(BiService $biService)
    {
        $this->biService = $biService;
    }

    public function biList(Request $request)
    {
        $bis = $this->biService->getAllBisByYear();
        try {
            return $this->successResponse($bis, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
