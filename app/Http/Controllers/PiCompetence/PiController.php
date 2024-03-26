<?php

namespace App\Http\Controllers\PiCompetence;

use App\Http\Controllers\Controller;
use App\Models\DimensionToPi;
use App\Models\OviggotaToPi;
use App\Models\PiCompetence\PiSelectionDetail;
use Illuminate\Http\Request;
use App\Services\PiService\PiService;

class PiController extends Controller
{
    private $piService;

    public function __construct(PiService $piService)
    {
        $this->piService = $piService;
    }

    public function index()
    {
        $pis = $this->piService->getAllPis();
        return view('pi.index', compact('pis'));
    }

    public function view($id)
    {
        $pi = $this->piService->getPiById($id);
        return view('pi.view', compact('pi'));
    }

    public function piBySubject(Request $request)
    {
        if($request->subject_id){
            if($request->edit_oviggota_id){
                $data['selected_pi'] = OviggotaToPi::where('oviggota_uid', $request->edit_oviggota_id)->pluck('pi_uid')->toArray();
            }
            elseif($request->edit_dimension_id){
                $data['selected_pi'] = DimensionToPi::where('dimension_uid', $request->edit_dimension_id)->pluck('pi_uid')->toArray();
            }
            elseif($request->edit_pi_selection_id){
                $data['selected_pi'] = PiSelectionDetail::where('pi_selection_uid', $request->edit_pi_selection_id)->pluck('pi_uid')->toArray();
            }
            $data['pis'] = $this->piService->getAllPisBySubject($request->subject_id);
        }
        return response()->json($data);
    }
}
