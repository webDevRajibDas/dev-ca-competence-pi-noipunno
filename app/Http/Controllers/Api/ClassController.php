<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClassService\ClassService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class ClassController extends Controller
{
    use ApiResponser;
    private $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    public function classList(Request $request)
    {
        $classes = $this->classService->getAllClasses();
        try {
            // return response()->json([
            //     'status' => 200,
            //     'classes_count' => count($classes),
            //     'classes' => $classes
            // ]);
            return $this->successResponse($classes, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
