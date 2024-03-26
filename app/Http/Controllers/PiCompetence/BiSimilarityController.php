<?php

namespace App\Http\Controllers\PiCompetence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BiService\BiService;
use App\Services\CompetenceService\CompetenceService;

class BiSimilarityController extends Controller
{
    private $biService;
    private $competenceService;
    

    public function __construct(BiService $biService, CompetenceService $competenceService)
    {
        $this->biService = $biService;
        $this->competenceService = $competenceService;
    }

    public function index()
    {
        $biSimilarities = $this->biService->getBiSimilarAll();

        return view('bi_similarity.index', compact('biSimilarities'));
    }

    public function create() {
        $competences = $this->competenceService->getAllCompetences();
        $bis = $this->biService->getAllBis();

        return view('bi_similarity.create', compact('competences', 'bis'));
    }

    public function store(Request $request)
    {
        $bi1 = $this->biService->getBiById($request->bi_id);
        $bi2 = $this->biService->getBiById($request->similar_bi_id);

        $bi1->similarBis()->attach($bi2);
        
        return redirect()->route('bi-similarity');
    }

    public function edit($id) {
        $biSimilarList = $this->biService->getBiSimilarById($id);
         
        $competences = $this->competenceService->getAllCompetences();
        $bis = $this->biService->getAllBis();
        return view('bi_similarity.edit', compact('biSimilarList', 'competences', 'bis'));
    }

    public function update(Request $request, $id) {
        $biSimilarity = $this->biService->getBiSimilarById($id);

        $newBiId = $request->input('bi_id');
        $newSimilarBiId = $request->input('similar_bi_id');

        $bi1 = $this->biService->getBiById($newBiId);
        $bi2 = $this->biService->getBiById($newSimilarBiId);

        if (!$bi1 || !$bi2) {
            return redirect()->back()->with('error', 'One or more of the selected bi records do not exist.');
        }

        $biSimilarity->bi1()->associate($bi1);
        $biSimilarity->bi2()->associate($bi2);

        $biSimilarity->save();

        return redirect()->route('bi-similarity');
    }

    public function destroy($id)
    {
        $biSimilarity = $this->biService->getBiSimilarById($id);

        $biSimilarity->bi1()->dissociate();
        $biSimilarity->bi2()->dissociate();

        $biSimilarity->delete();

        return redirect()->route('bi-similarity')->with('success', 'Bi Similarity deleted successfully.');
    }
}
