<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OviggotaToPi;
use App\Models\PiCompetence\Pi;
use App\Models\Setting\Oviggota;
use App\Services\ChapterService\ChapterService;
use App\Services\OviggotaService\OviggotaService;
use App\Services\SubjectService\SubjectService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class OviggotaController extends Controller
{
    use ApiResponser;
    private $oviggotaService;

    public function __construct(OviggotaService $oviggotaService)
    {
        $this->oviggotaService = $oviggotaService;
    }

    public function oviggotaBySubject(Request $request)
    {
        if ($request->subject_uid) {
            // $subjects = $this->oviggotaService->getOviggotaBySubjectId($request->subject_uid);
            if($request->session){
                $oviggotas = Oviggota::where('subject_uid', $request->subject_uid)->where('session', $request->session)->get();
            }
            else{
                $oviggotas = Oviggota::where('subject_uid', $request->subject_uid)->where('session', date('Y'))->get();
            }

            foreach($oviggotas as $key=>$item){
                $oviggotaPi = OviggotaToPi::where('oviggota_uid', $item->uid)->pluck('pi_uid');
                $oviggotas[$key]['pis'] = Pi::whereIn('uid', $oviggotaPi)->get();

                // $oviggotas[$key]['pis'] = OviggotaToPi::select('pi_uid')->where('oviggota_uid', $item->uid)->get();
                // $oviggotas[$key]['pis'] = Pi::whereIn('uid', $oviggotaPi)->get();
            }
        }

        try {
            return $this->successResponse($oviggotas, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    // public function oviggotaBySubject(Request $request)
    // {
    //     if ($request->subject_uid) {
    //         $subjects = $this->oviggotaService->getOviggotaBySubjectId($request->subject_uid);
    //     }

    //     try {
    //         return $this->successResponse($subjects, Response::HTTP_OK);
    //     } catch (Exception $e) {
    //         return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
    //     }
    // }
}
