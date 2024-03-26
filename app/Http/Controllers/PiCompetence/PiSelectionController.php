<?php

namespace App\Http\Controllers\PiCompetence;

use App\Http\Controllers\Controller;
use App\Models\AssessmentDetail;
use App\Models\PiCompetence\PiSelectionDetail;
use Illuminate\Http\Request;
use App\Services\SubjectService\SubjectService;
use App\Services\ClassService\ClassService;
use App\Services\PiSelectionService\PiSelectionService;
use App\Services\PiService\PiService;
use App\Models\PiCompetence\Pi;
use App\Models\DimensionToPi;
use App\Services\AssessmentService\AssessmentService;
use PDF;

class PiSelectionController extends Controller
{
    private $classService;
    private $subjectService;
    private $piSelectionService;
    private $piService;
    private $assessmentService;

    public function __construct(AssessmentService $assessmentService,PiService $piService, PiSelectionService $piSelectionService, SubjectService $subjectService, ClassService $classService)
    {
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->piSelectionService = $piSelectionService;
        $this->piService = $piService;
        $this->assessmentService = $assessmentService;
    }

    public function index(Request $request)
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $pi_selections = $this->piSelectionService->getAll();
        return view('pi_selection.index', compact('classes', 'subjects', 'pi_selections'));
    }

    public function create()
    {
        $assessment_types = AssessmentDetail::where('assessment_uid', 1111111111)->where('uid', '!=' ,1234567890)->get();
        $classes = $this->classService->getAllClasses();
        return view('pi_selection.create', compact('classes', 'assessment_types'));
    }

    public function store(Request $request)
    {
        $pi_selection = $this->piSelectionService->create($request->all());

        foreach($request->pi_uid as $key => $item){
            $data_pi = new PiSelectionDetail();
            $data_pi->pi_selection_uid = $pi_selection->uid;
            $data_pi->pi_uid = $key;
            $data_pi->save();
        }

        return redirect()->route('pi-selection');
    }

    public function edit($uid)
    {
        $assessment_types = AssessmentDetail::where('assessment_uid', 1111111111)->where('uid', '!=' ,1234567890)->get();
        $editData = $this->piSelectionService->getById($uid);
        $classes = $this->classService->getAllClasses();
        return view('pi_selection.edit', compact('classes', 'assessment_types', 'editData'));
    }

    public function pdf($session, $subject_uid)
    {
        //$assessment= Assessment::where('uid', 1111111111)->where('uid', '!=' ,1234567890)->get();
        //$assessment_types = AssessmentDetail::where('assessment_uid', 1111111111)->where('uid', '!=' ,1234567890)->get();
        
        //$editData = $this->piSelectionService->getById($uid);

        //dd($editData->session);

        $data['piData']   = $this->piSelectionService->getBySession($session);
        $data['subjectUid']   = $subject_uid;
        
        $pdf = PDF::loadView('pi_selection.pi-pdf', $data);
        $fileName = 'pi-mullayon'.'pdf';
        return $pdf->stream($fileName);
    }

    public function update(Request $request, $uid)
    {
        $pi_selection = $this->piSelectionService->update($uid, $request->all());
        PiSelectionDetail::where('pi_selection_uid', $pi_selection->uid)->delete();

        foreach($request->pi_uid as $key => $item){
            $data_pi = new PiSelectionDetail();
            $data_pi->pi_selection_uid = $pi_selection->uid;
            $data_pi->pi_uid = $key;
            $data_pi->save();
        }
        return redirect()->route('pi-selection');
    }

    public function destroy(Request $request, $uid)
    {
        PiSelectionDetail::where('pi_selection_uid', $uid)->delete();
        $pi_selection = $this->piSelectionService->delete($uid);
        return redirect()->route('pi-selection');
    }
}
