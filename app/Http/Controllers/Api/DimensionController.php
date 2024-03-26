<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BiDimensionToBi;
use App\Models\DimensionToPi;
use App\Models\PiCompetence\Bi;
use App\Models\PiCompetence\Pi;
use App\Models\Setting\Oviggota;
use App\Services\BiDimensionService\BiDimensionService;
use App\Services\DimensionService\DimensionService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class DimensionController extends Controller
{
    use ApiResponser;
    private $dimensionService;
    private $biDimensionService;

    public function __construct(DimensionService $dimensionService, BiDimensionService $biDimensionService)
    {
        $this->dimensionService = $dimensionService;
        $this->biDimensionService = $biDimensionService;
    }

    public function dimensionBySubject(Request $request)
    {
        if ($request->subject_uid) {
            $dimensions = $this->dimensionService->getDimensionsBySubjectId($request->subject_uid);
            foreach($dimensions as $key=>$item){
                $dimensionPi = DimensionToPi::where('dimension_uid', $item->uid)->pluck('pi_uid');
                $dimensions[$key]['pis'] = Pi::whereIn('uid', $dimensionPi)->get();
            }
        }
        else {
            $dimensions = $this->dimensionService->getAllDimensions();
            foreach($dimensions as $key=>$item){
                $dimensionPi = DimensionToPi::where('dimension_uid', $item->uid)->pluck('pi_uid');
                $dimensions[$key]['pis'] = Pi::whereIn('uid', $dimensionPi)->get();
            }
        }
        try {
            return $this->successResponse($dimensions, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
    
    public function getBiDimension(Request $request)
    {
        $dimensions = $this->biDimensionService->getAllBiDimensions();
        foreach($dimensions as $key=>$item){
            $dimensionBi = BiDimensionToBi::where('bi_dimension_uid', $item->uid)->pluck('bi_uid');
            $dimensions[$key]['bis'] = Bi::whereIn('uid', $dimensionBi)->get();
        }
        
        try {
            return $this->successResponse($dimensions, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
