<?php

namespace App\Http\Controllers\PiCompetence;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Services\BiService\BiService;
use App\Http\Requests\Bi\CopyBiRequest;
use App\Services\ClassService\ClassService;
use App\Services\WeightService\WeightService;
use App\Services\SubjectService\SubjectService;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\BiWeightService\BiWeightService;

class BiController extends Controller
{
    private $weightService;
    private $biWeightService;
    private $biService;
    private $classService;
    private $subjectService;

    public function __construct(
    BiService $biService,
    SubjectService $subjectService,
    ClassService $classService,
    WeightService $weightService,
    BiWeightService $biWeightService,
    )
    {
        $this->weightService = $weightService;
        $this->biWeightService = $biWeightService;
        $this->biService = $biService;
        $this->classService = $classService;
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $bis = $this->biService->getAllBisByYear();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;

        $currentPageItems = $bis->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $bis = new LengthAwarePaginator($currentPageItems, $bis->count(), $perPage);
        $bis->setPath(request()->url());

        return view('bi.index', compact('bis'));
    }

    public function create()
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $weights = $this->weightService->getAllWeights();
        return view('bi.create', compact('classes', 'subjects', 'weights'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $bi = $this->biService->createBi($request->all());
            foreach ($request->weight_uid as $index => $weightUid) {

                $data['bi_uid'] = $bi->uid;
                $data['weight_uid'] = $weightUid;
                $data['title_en'] = $request->title_en[$index];
                $data['title_bn'] = $request->title_bn[$index];
                $data['description'] = $request->details[$index];

                $this->biWeightService->create($data);
            }
            DB::commit();

            return redirect()->route('bi');
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => $request->Lang->Common->Form->NotCreate ?? $e->getMessage(),
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
    }

    public function edit($uid) {
        $bi = $this->biService->getBiById($uid);
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $weights = $this->weightService->getAllWeights();
        return view('bi.edit', compact('bi', 'classes', 'subjects', 'weights'));
    }

    public function update(Request $request, $uid) {
        try {
            DB::beginTransaction();
            $bi = $this->biService->updateBi($uid, $request->all());
            foreach ($request->weight_uid as $index => $weightUid) {
                $data['title_en'] = $request->title_en[$index];
                $data['title_bn'] = $request->title_bn[$index];
                $data['description'] = $request->details[$index];

                $this->biWeightService->update($request->wuid[$index], $data);
            }
            DB::commit();
            return redirect()->route('bi');
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => $request->Lang->Common->Form->NotCreate ?? $e->getMessage(),
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
    }

    public function destroy(Request $request, $uid) {
        $bi = $this->biService->deleteBi($uid);
        return redirect()->route('bi');
    }

    public function generateBiPdf()
    {
        $data['bis'] = $this->biService->getAllBisByYear();

        $pdf = PDF::loadView('bi.pdf.pdf-view', $data);
        $fileName = 'bi.' . 'pdf';
        return $pdf->stream($fileName);
    }

    public function copyBi(Request $request){
        $bis = $this->biService->getAllBisByPagination($request);
        return view('bi.copy',compact('bis'));
    }

    public function copyBiStore(CopyBiRequest $request){

        $response = $this->biService->copyBiStore($request);
        if ($response) {
            $notification = array(
                'message'       => 'Bi Copied Successfully!!',
                'alert-type'    => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message'       => 'Bi Does not Copied!!',
            'alert-type'    => 'error'
        );
        return back()->with($notification);
    }
}
