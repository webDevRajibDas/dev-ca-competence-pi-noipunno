<?php

namespace App\Http\Controllers\Setting;

use PDF;
use Illuminate\Http\Request;
use App\Models\DimensionToPi;
use App\Http\Controllers\Controller;
use App\Services\ClassService\ClassService;
use App\Services\WeightService\WeightService;
use App\Services\SubjectService\SubjectService;
use App\Services\OviggotaService\OviggotaService;
use App\Services\DimensionService\DimensionService;
use App\Http\Requests\Dimension\CopyDimensionRequest;

class DimensionController extends Controller
{
    private $classService;
    private $subjectService;
    private $dimensionService;
    private $oviggotaService;
    private $weightService;

    public function __construct(DimensionService $dimensionService, SubjectService $subjectService, ClassService $classService, OviggotaService $oviggotaService)
    {
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->dimensionService = $dimensionService;
        $this->oviggotaService = $oviggotaService;
    }

    public function index(Request $request)
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        // $dimensions = $this->dimensionService->getAllDimensions();
        $dimensions = $this->dimensionService->getAllDimensionByYear(date('Y'));
        return view('dimension.index', compact('classes', 'subjects', 'dimensions'));
    }

    public function create()
    {
        $classes = $this->classService->getAllClasses();
        return view('dimension.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $dimension = $this->dimensionService->createDimension($request->all());

        foreach ($request->pi_uid as $key => $item) {
            $data_pi = new DimensionToPi();
            $data_pi->dimension_uid = $dimension->uid;
            $data_pi->pi_uid = $key;
            $data_pi->save();
        }
        return redirect()->route('dimension');
    }

    public function edit($uid)
    {
        $dimension = $this->dimensionService->getDimensionById($uid);
        $classes = $this->classService->getAllClasses();
        return view('dimension.edit', compact('classes', 'dimension'));
    }

    public function update(Request $request, $uid)
    {
        $dimension = $this->dimensionService->updateDimension($uid, $request->all());
        DimensionToPi::where('dimension_uid', $dimension->uid)->delete();

        foreach ($request->pi_uid as $key => $item) {
            $data_pi = new DimensionToPi();
            $data_pi->dimension_uid = $dimension->uid;
            $data_pi->pi_uid = $key;
            $data_pi->save();
        }
        return redirect()->route('dimension');
    }

    public function destroy(Request $request, $uid)
    {
        DimensionToPi::where('dimension_uid', $uid)->delete();
        $dimension = $this->dimensionService->deleteDimension($uid);
        return redirect()->route('dimension');
    }

    public function diPdf()
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();

        return view('dimension.pdf.index', compact('classes', 'subjects'));
    }

    public function generatePdf(Request $request)
    {

        $data['dimesions'] = $this->dimensionService->getDimensionsBySubjectId(['subject_id' => $request->subject_uid]);
        $data['class'] =   $class   = $this->classService->getClassById($request->class_uid);
        $data['subject'] = $subject = $this->subjectService->getSubjectById($request->subject_uid);

        $pdf = PDF::loadView('dimension.pdf.pdf-view', $data);
        $fileName = @$class['class_id'] . '_' . @$subject['name'] . '.' . 'pdf';
        return $pdf->stream($fileName);
    }


    public function copyDimension(Request $request)
    {
        $dimensions  = $this->dimensionService->getDimensionByPagination($request);
        $classes    = $this->classService->getAllClasses();
        return view('dimension.copy', compact('classes', 'dimensions'));
    }

    public function copyDimensionStore(CopyDimensionRequest $request)
    {

        $response = $this->dimensionService->copyDimensionStore($request);
        if ($response) {
            $notification = array(
                'message'       => 'Dimension Copied Successfully!!',
                'alert-type'    => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message'       => 'Dimension Does not Copied!!',
            'alert-type'    => 'error'
        );
        return back()->with($notification);
    }
}
