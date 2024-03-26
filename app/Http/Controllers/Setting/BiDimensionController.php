<?php

namespace App\Http\Controllers\Setting;

use PDF;
use Illuminate\Http\Request;
use App\Models\DimensionToPi;
use App\Models\BiDimensionToBi;
use App\Http\Controllers\Controller;
use App\Services\BiService\BiService;
use App\Services\WeightService\WeightService;
use App\Services\OviggotaService\OviggotaService;
use App\Services\BiDimensionService\BiDimensionService;
use App\Http\Requests\BiDimension\CopyBiDimensionRequest;

class BiDimensionController extends Controller
{
    private $bidimensionService;
    private $oviggotaService;
    private $weightService;
    private $biService;

    public function __construct(BiService $biService, BiDimensionService $bidimensionService, OviggotaService $oviggotaService)
    {
        $this->biService = $biService;
        $this->bidimensionService = $bidimensionService;
        $this->oviggotaService = $oviggotaService;
    }

    public function index(Request $request)
    {
        $dimensions = $this->bidimensionService->getAllBiDimensions();
        return view('bi_dimension.index', compact('dimensions'));
    }

    public function create()
    {
        $bis = $this->biService->getAllBis();
        return view('bi_dimension.create', compact('bis'));
    }

    public function store(Request $request)
    {
        $dimension = $this->bidimensionService->createBiDimension($request->all());
        foreach($request->bi_uid as $key => $item){
            $data_bi = new BiDimensionToBi();
            $data_bi->bi_dimension_uid = $dimension->uid;
            $data_bi->bi_uid = $key;
            $data_bi->save();
        }
        return redirect()->route('bi.dimension');
    }

    public function edit($uid)
    {
        $bis = $this->biService->getAllBis();
        $dimension = $this->bidimensionService->getBiDimensionById($uid);
        return view('bi_dimension.edit', compact('dimension', 'bis'));
    }

    public function update(Request $request, $uid)
    {
        $dimension = $this->bidimensionService->updateBiDimension($uid, $request->all());
        BiDimensionToBi::where('bi_dimension_uid', $dimension->uid)->delete();

        foreach($request->bi_uid as $key => $item){
            $data_bi = new BiDimensionToBi();
            $data_bi->bi_dimension_uid = $dimension->uid;
            $data_bi->bi_uid = $key;
            $data_bi->save();
        }
        return redirect()->route('bi.dimension');
    }

    public function destroy(Request $request, $uid)
    {
        BiDimensionToBi::where('bi_dimension_uid', $uid)->delete();
        $dimension = $this->bidimensionService->deleteBiDimension($uid);
        return redirect()->route('bi.dimension');
    }

    public function generatePdf(Request $request)
    {
        $data['dimesions'] = $this->bidimensionService->getAllBiDimensions();
        $pdf = PDF::loadView('bi_dimension.pdf.pdf-view', $data);
        $fileName = 'bi-dimension' . 'pdf';
        return $pdf->stream($fileName);
    }


    public function copyBiDimension(Request $request)
    {
        $dimensions = $this->bidimensionService->getAllBiDimensionsByPagination($request);
        return view('bi_dimension.copy', compact('dimensions'));
    }

    public function copyBiDimensionStore(CopyBiDimensionRequest $request)
    {


        $response = $this->bidimensionService->copyBiDimensionStore($request);
        if ($response) {
            $notification = array(
                'message'       => 'Bi Dimension Copied Successfully!!',
                'alert-type'    => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message'       => 'Bi Dimension Does not Copied!!',
            'alert-type'    => 'error'
        );
        return back()->with($notification);
    }


}
