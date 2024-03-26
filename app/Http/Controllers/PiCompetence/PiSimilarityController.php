<?php

namespace App\Http\Controllers\PiCompetence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PiService\PiService;
use App\Services\CompetenceService\CompetenceService;

use App\Services\SubjectService\SubjectService;
use App\Services\ClassService\ClassService;
use App\Services\ChapterService\ChapterService;

class PiSimilarityController extends Controller
{
    private $piService;
    private $competenceService;
    private $classService;
    private $subjectService;
    private $chapterService;
    

    public function __construct(
        PiService $piService,
        CompetenceService $competenceService,
        SubjectService $subjectService,
        ClassService $classService,
        ChapterService $chapterService
    )
    {
        $this->piService = $piService;
        $this->competenceService = $competenceService;
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->chapterService = $chapterService;
    }

    public function index()
    {
        $piSimilarities = $this->piService->getPiSimilerAll();

        return view('pi_similarity.index', compact('piSimilarities'));
    }

    public function create() {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $chapters = $this->chapterService->getAllChapters();
        $competences = $this->competenceService->getAllCompetences();
        $pis = $this->piService->getAllPis();

        return view('pi_similarity.create', compact('competences', 'pis', 'classes', 'subjects', 'chapters'));
    }

    public function store(Request $request)
    {
        $pi1 = $this->piService->getPiById($request->pi_id);
        $pi2 = $this->piService->getPiById($request->similar_pi_id);
        
        $pi1->similarPis()->attach($pi2);
        
        return redirect()->route('pi-similarity');
    }

    public function edit($id) {
        $piSimilarList = $this->piService->getPiSimilerById($id);

        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $chapters = $this->chapterService->getAllChapters(); 
        $competences = $this->competenceService->getAllCompetences();
        $pis = $this->piService->getAllPis();
        return view('pi_similarity.edit', compact('piSimilarList', 'competences', 'pis', 'classes', 'subjects', 'chapters'));
    }

    public function update(Request $request, $id) {
        $piSimilarity = $this->piService->getPiSimilerById($id);

        $newPiId = $request->input('pi_id');
        $newSimilarPiId = $request->input('similar_pi_id');

        $pi1 = $this->piService->getPiById($newPiId);
        $pi2 = $this->piService->getPiById($newSimilarPiId);

        if (!$pi1 || !$pi2) {
            return redirect()->back()->with('error', 'One or more of the selected pi records do not exist.');
        }

        $piSimilarity->pi1()->associate($pi1);
        $piSimilarity->pi2()->associate($pi2);

        $piSimilarity->save();

        return redirect()->route('pi-similarity');
    }

    public function destroy($id)
    {
        $piSimilarity = $this->piService->getPiSimilerById($id);

        $piSimilarity->pi1()->dissociate();
        $piSimilarity->pi2()->dissociate();

        $piSimilarity->delete();

        return redirect()->route('pi-similarity')->with('success', 'Pi Similarity deleted successfully.');
    }

}
