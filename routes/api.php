<?php

use App\Http\Controllers\Api\AssessmentController;
use App\Http\Controllers\Api\BiController;
use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\CompetenceController;
use App\Http\Controllers\Api\DimensionController;
use App\Http\Controllers\Api\OviggotaController;
use App\Http\Controllers\Api\PiController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\PiSelectionForAssessmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/classes', [ClassController::class, 'classList']);
Route::get('/class-wise-subject', [SubjectController::class, 'classWiseSubject']);
Route::get('/subject-wise-chapters', [SubjectController::class, 'subjectWiseChapter']);

Route::get('/assessments', [AssessmentController::class, 'assessmentList']);
Route::get('/assessment-details', [AssessmentController::class, 'assessmentDetails']);

Route::get('/competences', [CompetenceController::class, 'competenceList']);
Route::get('/competences-by-chapter', [CompetenceController::class, 'competenceByChapter']);

Route::get('/competences-by-class', [CompetenceController::class, 'competenceByClass']);
Route::get('/competences-by-subject', [CompetenceController::class, 'competenceBySubject']);
Route::get('/competences-by-class-subject', [CompetenceController::class, 'competenceByClassSubject']);

Route::get('/pis-by-competence', [PiController::class, 'piByCompetence']);
Route::get('/pis-by-subject', [PiController::class, 'piBySubject']);
Route::get('/single-pi', [PiController::class, 'singlePi']);
Route::get('/pi-weight', [PiController::class, 'piWeight']);
Route::get('/bis', [BiController::class, 'biList']);
// Route::get('/pis-by-chapter', [PiController::class, 'piBychapter']);
Route::get('/pi-selection-list', [PiController::class, 'piSelection']);
Route::get('/pi-selection-list-by-subject', [PiController::class, 'piSelectionBySubject']);

Route::get('/oviggota-by-subject', [OviggotaController::class, 'oviggotaBySubject']);
Route::get('/dimension-by-subject', [DimensionController::class, 'dimensionBySubject']);
Route::get('/bi-dimension', [DimensionController::class, 'getBiDimension']);

//Pi selection for Assessment
Route::get('/pi-selection-for-assessment', [PiSelectionForAssessmentController::class, 'index']);
Route::get('/pi-selection-for-assessment/create', [PiSelectionForAssessmentController::class, 'create']);
Route::post('/pi-selection-for-assessment', [PiSelectionForAssessmentController::class, 'store']);
Route::get('/pi-selection-for-assessment/{id}/edit', [PiSelectionForAssessmentController::class, 'edit']);
Route::put('/pi-selection-for-assessment/{id}', [PiSelectionForAssessmentController::class, 'update']);
Route::delete('/pi-selection-for-assessment/{id}', [PiSelectionForAssessmentController::class, 'destroy']);

Route::group(['middleware' => ['json.response', 'api.share.sso']], function () {
});
