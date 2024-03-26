<?php

namespace App\Http\Controllers\PiCompetence;

use PDF;
use Illuminate\Http\Request;
use App\Models\PiCompetence\Pi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\PiService\PiService;
use App\Models\PiCompetence\PiAttribute;
use App\Services\ClassService\ClassService;
use App\Services\WeightService\WeightService;
use App\Services\ChapterService\ChapterService;
use App\Services\SubjectService\SubjectService;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\OviggotaService\OviggotaService;
use App\Services\CompetenceService\CompetenceService;
use App\Http\Requests\Competence\CopyCompetenceRequest;

class CompetenceController extends Controller
{
    private $competenceService;
    private $classService;
    private $subjectService;
    private $piService;
    private $chapterService;
    private $weightService;
    private $oviggotaService;

    public function __construct(
        CompetenceService $competenceService,
        SubjectService $subjectService,
        ClassService $classService,
        PiService $piService,
        ChapterService $chapterService,
        WeightService $weightService,
        OviggotaService $oviggotaService
    ) {
        $this->competenceService = $competenceService;
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->piService = $piService;
        $this->chapterService = $chapterService;
        $this->weightService = $weightService;
        $this->oviggotaService = $oviggotaService;
    }

    public function index()
    {
        $competences = $this->competenceService->getCompetencesBySession(date('Y'));
        // $competences = $this->competenceService->getAllCompetences();
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $perPage = 15;

        // $currentPageItems = $competences->slice(($currentPage - 1) * $perPage, $perPage)->all();
        // $competences = new LengthAwarePaginator($currentPageItems, $competences->count(), $perPage);
        // $competences->setPath(request()->url());

        return view('competence.index', compact('competences'));
    }

    public function create()
    {
        $classes    = $this->classService->getAllClasses();
        $subjects   = $this->subjectService->getAllSubjects();
        $chapters   = $this->chapterService->getAllChapters();
        $weights    = $this->weightService->getAllWeights();

        return view('competence.create', compact('classes', 'subjects', 'chapters', 'weights'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $competence = $this->competenceService->createCompetence($request->all());

            DB::commit();

            $notification = array(
                'message' => 'Competence Created Successfully!!',
                'alert-type' => 'success'
            );

            return redirect()->route('competence')->with($notification);
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => $request->Lang->Common->Form->NotCreate ?? $e->getMessage(),
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
    }

    public function edit($uid)
    {
        $competence = $this->competenceService->getCompetenceById($uid);
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $chapters = $this->chapterService->getAllChapters();
        $weights = $this->weightService->getAllWeights();

        return view('competence.edit', compact('subjects', 'classes', 'competence', 'chapters', 'weights'));
    }

    public function view($uid)
    {
        $competence = $this->competenceService->getCompetenceById($uid);
        $weights = $this->weightService->getAllWeights();
        return view('competence.view', compact('competence', 'weights'));
    }



    public function viewall()
    {
        $competences = $this->competenceService->getAllCompetences();
        $weights = $this->weightService->getAllWeights();
        return view('competence.viewall', compact('competences', 'weights'));
    }

    public function update(Request $request, $uid)
    {
        try {
            DB::beginTransaction();
            $competence = $this->competenceService->updateCompetence($uid, $request->all());

            DB::commit();

            $notification = array(
                'message' => 'Competence Updated Successfully!!',
                'alert-type' => 'success'
            );
            return redirect()->route('competence')->with($notification);
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message'       => $request->Lang->Common->Form->NotCreate ?? $e->getMessage(),
                'alert-type'    => 'error',
            );
            return back()->with($notification);
        }
    }

    public function destroy(Request $request, $uid)
    {
        try {
            DB::beginTransaction();
            $this->competenceService->deleteCompetence($uid);
            DB::commit();

            $notification = array(
                'message' => 'Competence deleted Successfully!!',
                'alert-type' => 'success'
            );

            return redirect()->route('competence')->with($notification);
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => $request->Lang->Common->Form->NotCreate ?? $e->getMessage(),
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
    }

    public function competenceid()
    {
        $competences = $this->competenceService->getAllCompetences();



        foreach ($competences as $competence) {
            foreach ($competence->pis as $pi) {
                $competenceid = $pi->competence->id;
                $pi->competence_id = $competenceid;
                $pi->save();
            }
        }

        return redirect()->route('competence');
    }

    public function competenceuid()
    {
        $competences = $this->competenceService->getAllCompetences();

        foreach ($competences as $competence) {
            $competence->uid = hexdec(uniqid());
            // Assuming you have a relationship method named 'class' in your Subject model
            $classUid = $competence->oldclass->uid;
            $competence->class_uid = $classUid;

            $subjectUid = $competence->oldsubject->uid;
            $competence->subject_uid = $subjectUid;
            // Update class_uid
            $competence->save();
        }

        return redirect()->route('competence');
    }

    public function piuid()
    {
        $competences = $this->competenceService->getAllCompetences();

        foreach ($competences as $competence) {
            foreach ($competence->uidpis as $pi) {
                $competenceuid = $pi->picompetence->uid;
                $pi->uid = hexdec(uniqid());
                $pi->competence_uid = $competenceuid;
                $pi->save();
            }
        }

        return redirect()->route('competence');
    }

    public function piPdf()
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();

        return view('competence.pdf.index', compact('classes', 'subjects'));
    }
    public function competencePdf()
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();

        return view('competence.pdf.index_competence', compact('classes', 'subjects'));
    }

    public function generatePdf(Request $request)
    {
        $data['oviggotas'] = $this->oviggotaService->getOviggotaBySubjectId(['subject_id' => $request->subject_uid]);
        $data['weights']   = $this->weightService->getAllWeights();

        $class = $this->classService->getClassById($request->class_uid);
        $subject = $this->subjectService->getSubjectById($request->subject_uid);
        // return view('competence.pdf.pdf-view', $data);
        $pdf = PDF::loadView('competence.pdf.pdf-view', $data);
        $fileName = @$class['class_id'] . '_' . @$subject['name'] . '.' . 'pdf';
        return $pdf->stream($fileName);
    }

    public function generateCompetencePdf(Request $request)
    {
        $data['competences'] = $this->competenceService->getAllCompetencesByClassSubject(['class_id' => $request->class_uid, 'subject_id' => $request->subject_uid]);
        $data['weights'] = $this->weightService->getAllWeights();
        $class = $this->classService->getClassById($request->class_uid);
        $subject = $this->subjectService->getSubjectById($request->subject_uid);
        // return view('competence.pdf.pdf-view-porisisto', $data);
        $pdf = PDF::loadView('competence.pdf.pdf-view-porisisto', $data);
        $fileName = @$class['class_id'] . '_' . @$subject['name'] . '_porisisto.' . 'pdf';
        return $pdf->stream($fileName);
    }

    // public function generateCompetencePdf1(Request $request)
    // {
    //     $data['competences'] = $this->competenceService->getAllCompetencesByClassSubject(['class_id' => $request->class_uid, 'subject_id' => $request->subject_uid]);
    //     $data['weights'] = $this->weightService->getAllWeights();
    //     $class = $this->classService->getClassById($request->class_uid);
    //     $subject = $this->subjectService->getSubjectById($request->subject_uid);
    //     $pdf = PDF::loadView('competence.pdf.pdf-view', $data);
    //     $fileName = @$class['class_id'] . '_' . @$subject['name'] . '.' . 'pdf';
    //     return $pdf->stream($fileName);
    // }


    public function copyCompetence(Request $request)
    {

        $competences = $this->competenceService->getAllCompetencesByPagination($request);
        $classes     = $this->classService->getAllClasses();
        $subjects    = $this->subjectService->getAllSubjects();
        return view('competence.copy', compact('competences', 'classes', 'subjects'));
    }

    public function copyCompetenceStore(CopyCompetenceRequest $request)
    {

        $response = $this->competenceService->copyCompetenceStore($request);
        if ($response) {
            $notification = array(
                'message' => 'Competence Copied Successfully!!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message' => 'Competence Does not Copied!!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }


    public function piLists(Request $request)
    {
        $pis = $this->competenceService->piLists($request);

        $competenceId = $request->id;

        return view('competence.pi.index', compact('pis', 'competenceId'));
    }


    public function addPi(Request $request)
    {
        $weights        = $this->weightService->getAllWeights();

        $competenceId   = $request->id;

        return view('competence.pi.create', compact('weights', 'competenceId'));
    }


    public function storePi(Request $request)
    {

        $response = $this->competenceService->storePi($request);

        if ($response) {
            $notification = array(
                'message'       => 'Pi সফলভাবে যুক্ত করা হয়েছে!!',
                'alert-type'    => 'success',
            );

            return redirect()->route('competence.lists.pi', ['id' => $request->competence_uid])->with($notification);
        }

        $notification = array(
            'message' =>  'Something went wrong!!',
            'alert-type' => 'error',
        );
        return back()->with($notification);
    }




    public function editPi(Request $request)
    {
        $pi = Pi::where('competence_uid', $request->id)->where('uid', $request->pi_id)->first();
        return view('competence.pi.edit', compact('pi'));
    }

    public function updatePi(Request $request)
    {
        $response = $this->competenceService->updatePi($request);

        if ($response) {
            $notification = array(
                'message'       =>  'Pi সফলভাবে আপডেট করা হয়েছে!!',
                'alert-type'    => 'success',
            );

            return redirect()->route('competence.lists.pi', ['id' => $request->id])->with($notification);
        }

        $notification = array(
            'message'       =>  'Something went wrong!!',
            'alert-type'    => 'error',
        );
        return back()->with($notification);
    }

    public function deletePi(Request $request)
    {
        $response = $this->competenceService->deletePi($request);

        if ($response) {
            $notification = array(
                'message'       =>  'Pi সফলভাবে ডিলিট করা হয়েছে!!',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }

        $notification = array(
            'message'           =>  'Something went wrong!!',
            'alert-type'        => 'error',
        );
        return back()->with($notification);
    }
}
