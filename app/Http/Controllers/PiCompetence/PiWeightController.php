<?php

namespace App\Http\Controllers\PiCompetence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Services\CompetenceService\CompetenceService;
use App\Services\SubjectService\SubjectService;
use App\Services\ClassService\ClassService;
use App\Services\PiService\PiService;
use App\Services\ChapterService\ChapterService;
use App\Services\WeightService\WeightService;
use App\Services\PiWeightService\PiWeightService;
use App\Services\PiWeightGuideService\PiWeightGuideService;

class PiWeightController extends Controller
{
    private $competenceService;
    private $classService;
    private $subjectService;
    private $piService;
    private $chapterService;
    private $weightService;
    private $piWeightService;
    private $piWeighGuidetService;

    public function __construct(
        CompetenceService $competenceService,
        SubjectService $subjectService,
        ClassService $classService,
        PiService $piService,
        ChapterService $chapterService,
        WeightService $weightService,
        PiWeightService $piWeightService,
        PiWeightGuideService $piWeightGuideService
    ){
        $this->competenceService = $competenceService;
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->piService = $piService;
        $this->chapterService = $chapterService;
        $this->weightService = $weightService;
        $this->piWeightService = $piWeightService;
        $this->piWeightGuideService = $piWeightGuideService;
    }

    public function index()
    {
        $piWeights = $this->piWeightService->getAll();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15; 
    
        $currentPageItems = $piWeights->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $piWeights = new LengthAwarePaginator($currentPageItems, $piWeights->count(), $perPage);
        $piWeights->setPath(request()->url());
        
        return view('pi-weight-guide.index', compact('piWeights'));
    }

    public function create()
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $chapters = $this->chapterService->getAllChapters();
        $competences = $this->competenceService->getAllCompetences();
        $pis = $this->piService->getAllPis();
        $weights = $this->weightService->getAllWeights();
        return view('pi-weight-guide.create', compact('classes', 'subjects', 'chapters', 'competences', 'pis', 'weights'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $piWeight = $this->piWeightService->create($request->all());
            foreach ($request->weight_uid as $index => $weightUid) {

                $data['pi_weight_uid'] = $piWeight->uid;
                $data['weight_uid'] = $weightUid;
                $data['title_en'] = $request->title_en[$index];
                $data['title_bn'] = $request->title_bn[$index];
                $data['description'] = $request->details[$index];

                $this->piWeightGuideService->create($data);
            }
            DB::commit();
        
            return redirect()->route('pi-weight');
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
        $piWeight = $this->piWeightService->getById($uid);
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $chapters = $this->chapterService->getAllChapters();
        $competences = $this->competenceService->getAllCompetences();
        $pis = $this->piService->getAllPis();
        $weights = $this->weightService->getAllWeights();
        return view('pi-weight-guide.edit', compact('subjects', 'classes', 'competences', 'chapters', 'pis', 'weights', 'piWeight'));
    }

    public function update(Request $request, $uid) {
        try {
            DB::beginTransaction();
            $piWeight = $this->piWeightService->update($uid, $request->all());
            foreach ($request->weight_uid as $index => $weightUid) {
                $data['title_en'] = $request->title_en[$index];
                $data['title_bn'] = $request->title_bn[$index];
                $data['description'] = $request->details[$index];

                $this->piWeightGuideService->update($request->wuid[$index], $data);
            }
            DB::commit();
            return redirect()->route('pi-weight');
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
        try {
            DB::beginTransaction();
            $this->piWeightService->delete($uid);
            DB::commit();
            return redirect()->route('pi-weight');
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => $request->Lang->Common->Form->NotCreate ?? $e->getMessage(),
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
    }

}
