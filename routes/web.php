<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setting\ClassController;
use App\Http\Controllers\Setting\SubjectController;
use App\Http\Controllers\Setting\ChapterController;
use App\Http\Controllers\Setting\WeightController;
use App\Http\Controllers\PiCompetence\CompetenceController;
use App\Http\Controllers\PiCompetence\PiWeightController;
use App\Http\Controllers\PiCompetence\PiController;
use App\Http\Controllers\PiCompetence\BiController;
use App\Http\Controllers\PiCompetence\BiTranscript;
use App\Http\Controllers\PiCompetence\PiSimilarityController;
use App\Http\Controllers\PiCompetence\BiSimilarityController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PiCompetence\PiSelectionController;
use App\Http\Controllers\Setting\DimensionController;
use App\Http\Controllers\Setting\BiDimensionController;
use App\Http\Controllers\Setting\OviggotaController;

// Route::get('/', function () {
//     return view('welcome');
// });




//assesment
Route::get('/assessment', function () {
    return view('assessment/index');
});

// Auth::routes([
//     'login' => false,
//     'logout' => false,
// ]);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('login/callback', [LoginController::class, 'handleCallback'])->name('login.callback');

Route::get('ca-logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth', 'share.sso']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/class', [ClassController::class, 'index'])->name('class');
    Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
    Route::post('/class', [ClassController::class, 'store'])->name('class.store');
    Route::get('/class/{id}/edit', [ClassController::class, 'edit'])->name('class.edit');
    Route::put('/class/{id}', [ClassController::class, 'update'])->name('class.update');
    Route::delete('/class/{id}', [ClassController::class, 'destroy'])->name('class.destroy');

    Route::get('/classuid', [ClassController::class, 'classuid'])->name('classuid');

    //Subject
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

    Route::get('/subject-list', [SubjectController::class, 'subjectList'])->name('class.subjects');

    Route::get('/subjectuid', [SubjectController::class, 'subjectuid'])->name('subjectuid');

    //Chapter
    Route::get('/chapter', [ChapterController::class, 'index'])->name('chapter');
    Route::get('/chapter/create', [ChapterController::class, 'create'])->name('chapter.create');
    Route::post('/chapter', [ChapterController::class, 'store'])->name('chapter.store');
    Route::get('/chapter/{id}/edit', [ChapterController::class, 'edit'])->name('chapter.edit');
    Route::put('/chapter/{id}', [ChapterController::class, 'update'])->name('chapter.update');
    Route::delete('/chapter/{id}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
    Route::get('/chapter/copy', [ChapterController::class, 'copyChapter'])->name('chapter.copy');
    Route::post('/chapter/copy/store', [ChapterController::class, 'copyChapterStore'])->name('chapter.copyStore');

    //Oviggota
    Route::get('/oviggota', [OviggotaController::class, 'index'])->name('oviggota');
    Route::get('/oviggota/create', [OviggotaController::class, 'create'])->name('oviggota.create');
    Route::post('/oviggota', [OviggotaController::class, 'store'])->name('oviggota.store');
    Route::get('/oviggota/{id}/edit', [OviggotaController::class, 'edit'])->name('oviggota.edit');
    Route::post('/oviggota/{id}', [OviggotaController::class, 'update'])->name('oviggota.update');
    Route::delete('/oviggota/{id}', [OviggotaController::class, 'destroy'])->name('oviggota.destroy');
    Route::get('/oviggota/copy', [OviggotaController::class, 'copyOviggota'])->name('oviggota.copy');
    Route::post('/oviggota/copy/store', [OviggotaController::class, 'copyOviggotaStore'])->name('oviggota.copyStore');

    //Dimension
    Route::get('/dimension', [DimensionController::class, 'index'])->name('dimension');
    Route::get('/dimension/create', [DimensionController::class, 'create'])->name('dimension.create');
    Route::post('/dimension', [DimensionController::class, 'store'])->name('dimension.store');
    Route::get('/dimension/{id}/edit', [DimensionController::class, 'edit'])->name('dimension.edit');
    Route::post('/dimension/{id}', [DimensionController::class, 'update'])->name('dimension.update');
    Route::delete('/dimension/{id}', [DimensionController::class, 'destroy'])->name('dimension.destroy');
    Route::get('/dimension-pdf', [DimensionController::class, 'diPdf'])->name('dimension-pdf');
    Route::get('/dimension-pdf-download', [DimensionController::class, 'generatePdf'])->name('dimension-pdf-download');
    Route::get('/dimension/copy', [DimensionController::class, 'copyDimension'])->name('dimension.copy');
    Route::post('/dimension/copy/store', [DimensionController::class, 'copyDimensionStore'])->name('dimension.copyStore');

    // BI Dimension
    Route::get('/bi-dimension', [BiDimensionController::class, 'index'])->name('bi.dimension');
    Route::get('/bi-dimension/create', [BiDimensionController::class, 'create'])->name('bi-dimension.create');
    Route::post('/bi-dimension', [BiDimensionController::class, 'store'])->name('bi-dimension.store');
    Route::get('/bi-dimension/{id}/edit', [BiDimensionController::class, 'edit'])->name('bi-dimension.edit');
    Route::post('/bi-dimension/{id}', [BiDimensionController::class, 'update'])->name('bi-dimension.update');
    Route::delete('/bi-dimension/{id}', [BiDimensionController::class, 'destroy'])->name('bi-dimension.destroy');
    Route::get('/bi-dimension-pdf-download', [BiDimensionController::class, 'generatePdf'])->name('bi-dimension-pdf-download');
    Route::get('/bi-dimension/copy', [BiDimensionController::class, 'copyBiDimension'])->name('bi-dimension.copy');
    Route::post('/bi-dimension/copy/store', [BiDimensionController::class, 'copyBiDimensionStore'])->name('bi-dimension.copyStore');


    //Pi Selection
    Route::get('/pi-selection', [PiSelectionController::class, 'index'])->name('pi-selection');
    Route::get('/pi-selection/create', [PiSelectionController::class, 'create'])->name('pi-selection.create');
    Route::post('/pi-selection', [PiSelectionController::class, 'store'])->name('pi-selection.store');
    Route::get('/pi-selection/{id}/edit', [PiSelectionController::class, 'edit'])->name('pi-selection.edit');
    Route::get('/pi-selection-pdf/{id}/{subject}', [PiSelectionController::class, 'pdf'])->name('pi-selection-pdf');
    Route::post('/pi-selection/{id}', [PiSelectionController::class, 'update'])->name('pi-selection.update');
    Route::delete('/pi-selection/{id}', [PiSelectionController::class, 'destroy'])->name('pi-selection.destroy');

    //Weight
    Route::get('/weight', [WeightController::class, 'index'])->name('weight');
    Route::get('/weight/create', [WeightController::class, 'create'])->name('weight.create');
    Route::post('/weight', [WeightController::class, 'store'])->name('weight.store');
    Route::get('/weight/{id}/edit', [WeightController::class, 'edit'])->name('weight.edit');
    Route::put('/weight/{id}', [WeightController::class, 'update'])->name('weight.update');
    Route::delete('/weight/{id}', [WeightController::class, 'destroy'])->name('weight.destroy');

    //Competence
    Route::get('/competence', [CompetenceController::class, 'index'])->name('competence');
    Route::get('/competence/create', [CompetenceController::class, 'create'])->name('competence.create');
    Route::post('/competence', [CompetenceController::class, 'store'])->name('competence.store');
    Route::get('/competence/{id}/edit', [CompetenceController::class, 'edit'])->name('competence.edit');
    Route::get('/competence/{id}/view', [CompetenceController::class, 'view'])->name('competence.view');
    Route::get('/competence/viewall', [CompetenceController::class, 'viewall'])->name('competence.viewall');
    Route::put('/competence/{id}', [CompetenceController::class, 'update'])->name('competence.update');
    Route::delete('/competence/{id}', [CompetenceController::class, 'destroy'])->name('competence.destroy');
    Route::get('/competence/copy', [CompetenceController::class, 'copyCompetence'])->name('competence.copy');
    Route::post('/competence/copy', [CompetenceController::class, 'copyCompetenceStore'])->name('competence.copyStore');
    //Competence pi
    Route::get('/competence/{id}/pi/lists', [CompetenceController::class, 'piLists'])->name('competence.lists.pi');
    Route::get('/competence/{id}/pi/add', [CompetenceController::class, 'addPi'])->name('competence.add.pi');
    Route::post('/competence/{id}/pi/store', [CompetenceController::class, 'storePi'])->name('competence.store.pi');
    Route::get('competence/{id}/pi/{pi_id}/edit', [CompetenceController::class, 'editPi'])->name('competence.edit.pi');
    Route::put('competence/{id}/pi/{pi_id}/update', [CompetenceController::class, 'updatePi'])->name('competence.update.pi');
    Route::delete('competence/{id}/pi/{pi_id}/delete', [CompetenceController::class, 'deletePi'])->name('competence.delete.pi');
    //Competence pi


    Route::get('/pi-pdf', [CompetenceController::class, 'piPdf'])->name('pi.pdf');
    Route::get('/competence-pdf', [CompetenceController::class, 'competencePdf'])->name('competence.pdf');
    Route::get('/pi-pdf-download', [CompetenceController::class, 'generatePdf'])->name('pi.pdf.download');
    Route::get('/competence-pdf-download', [CompetenceController::class, 'generateCompetencePdf'])->name('competence.pdf.download');

    Route::get('/competenceid', [CompetenceController::class, 'competenceid'])->name('competenceid');
    Route::get('/competenceuid', [CompetenceController::class, 'competenceuid'])->name('competenceuid');
    Route::get('/piuid', [CompetenceController::class, 'piuid'])->name('piuid');

    //Pi
    Route::get('/pi', [PiController::class, 'index'])->name('pi');
    Route::get('/pi/create', [PiController::class, 'create'])->name('pi.create');
    Route::post('/pi', [PiController::class, 'store'])->name('pi.store');
    Route::get('/pi/{id}/edit', [PiController::class, 'edit'])->name('pi.edit');
    Route::put('/pi/{id}', [PiController::class, 'update'])->name('pi.update');
    Route::delete('/pi/{id}', [PiController::class, 'destroy'])->name('pi.destroy');

    //Bi
    Route::get('/bi', [BiController::class, 'index'])->name('bi');
    Route::get('/bi/create', [BiController::class, 'create'])->name('bi.create');
    Route::post('/bi', [BiController::class, 'store'])->name('bi.store');
    Route::get('/bi/{id}/edit', [BiController::class, 'edit'])->name('bi.edit');
    Route::put('/bi/{id}', [BiController::class, 'update'])->name('bi.update');
    Route::delete('/bi/{id}', [BiController::class, 'destroy'])->name('bi.destroy');
    Route::get('/bi-pdf-download', [BiController::class, 'generateBiPdf'])->name('bi.pdf.download');
    Route::get('/bi/copy', [BiController::class, 'copyBi'])->name('bi.copy');
    Route::post('/bi/copy/store', [BiController::class, 'copyBiStore'])->name('bi.copyStore');

    //Pi similarity
    Route::get('/pi-similarity', [PiSimilarityController::class, 'index'])->name('pi-similarity');
    Route::get('/pi-similarity/create', [PiSimilarityController::class, 'create'])->name('pi-similarity.create');
    Route::post('/pi-similarity', [PiSimilarityController::class, 'store'])->name('pi-similarity.store');
    Route::get('/pi-similarity/{id}/edit', [PiSimilarityController::class, 'edit'])->name('pi-similarity.edit');
    Route::put('/pi-similarity/{id}', [PiSimilarityController::class, 'update'])->name('pi-similarity.update');
    Route::delete('/pi-similarity/{id}', [PiSimilarityController::class, 'destroy'])->name('pi-similarity.destroy');

    //Bi similarity
    Route::get('/bi-similarity', [BiSimilarityController::class, 'index'])->name('bi-similarity');
    Route::get('/bi-similarity/create', [BiSimilarityController::class, 'create'])->name('bi-similarity.create');
    Route::post('/bi-similarity', [BiSimilarityController::class, 'store'])->name('bi-similarity.store');
    Route::get('/bi-similarity/{id}/edit', [BiSimilarityController::class, 'edit'])->name('bi-similarity.edit');
    Route::put('/bi-similarity/{id}', [BiSimilarityController::class, 'update'])->name('bi-similarity.update');
    Route::delete('/bi-similarity/{id}', [BiSimilarityController::class, 'destroy'])->name('bi-similarity.destroy');

    //pi weight and guide
    Route::get('/pi-weight', [PiWeightController::class, 'index'])->name('pi-weight');
    Route::get('/pi-weight/create', [PiWeightController::class, 'create'])->name('pi-weight.create');
    Route::post('/pi-weight', [PiWeightController::class, 'store'])->name('pi-weight.store');
    Route::get('/pi-weight/{id}/edit', [PiWeightController::class, 'edit'])->name('pi-weight.edit');
    Route::get('/pi-weight/{id}/view', [PiWeightController::class, 'view'])->name('pi-weight.view');
    Route::get('/pi-weight/viewall', [PiWeightController::class, 'viewall'])->name('pi-weight.viewall');
    Route::put('/pi-weight/{id}', [PiWeightController::class, 'update'])->name('pi-weight.update');
    Route::delete('/pi-weight/{id}', [PiWeightController::class, 'destroy'])->name('pi-weight.destroy');

    Route::get('/class_wise_subject', [SubjectController::class, 'classWiseSubject'])->name('class_wise_subject');
    Route::get('/subject-wise-chapters', [ChapterController::class, 'subjectWiseChapter'])->name('subject_wise_chapter');
    Route::get('/pis-by-subject', [PiController::class, 'piBySubject'])->name('pi_by_subject');

    Route::get('bi-transcript', [BiTranscript::class, 'index'])->name('bi-transcript');
    Route::get('pi-transcript', [BiTranscript::class, 'indexpi'])->name('pi-transcript');
    Route::get('report-card', [BiTranscript::class, 'reportCard'])->name('report-card');
});
