<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Setting\Subject;
use Illuminate\Support\Facades\DB;

use App\Helper\UtilsCookie;
use GuzzleHttp\Psr7\Request;

class HomeController extends Controller
{

    private $base_url;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->base_url = config('app.master_api_url');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $allSubjects = DB::table('pi_classes')->select('class_id', 'name_bn')->get();
        
        $accessToken = request()->bearerToken() ?? UtilsCookie::getCookie();
        $this->base_url = config('app.master_api_url');
        $Urlinstitute = $this->base_url.'/v2/get-institute-data';
        
        $response1 = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
        ])
        ->withOptions([
            'verify' => false
        ])
        ->get($Urlinstitute);
        
        if ($response1->successful()) {
            $instituteData = $response1->json();
        } else {
            $statusCode = $response1->status();
            $errorMessage = $response1->body();
        }

        $urlStudents = $this->base_url.'/v2/get-student-data';

        $response2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
        ])
        ->withOptions([
            'verify' => false
        ])
        ->get($urlStudents);
        
        if ($response2->successful()) {
            $studentsData = $response2->json();
        } else {
            $statusCode = $response2->status();
            $errorMessage = $response2->body();
        }


        $urlSubTeacher = $this->base_url.'/v2/get-teacher-subjectwise';
        $response3 = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
        ])
        ->withOptions([
            'verify' => false
        ])
        ->get($urlSubTeacher);

        if ($response3->successful()) {
            $teacherSubject = $response3->json();
        
        } else {
            $statusCode = $response3->status();
            $errorMessage = $response3->body();
        }

        //Chart 4
        $urlBoardWise = $this->base_url.'/v2/get-institute-teacher';

        $responseData = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
        ])
        ->withOptions([
            'verify' => false
        ])
        ->get($urlBoardWise);

        if ($responseData->successful()) {
            $dataBIT = $responseData->json();
        } else {
            $statusCode = $responseData->status();
            $errorMessage = $responseData->body();
        }
       
        return view('home', ['subjects'=>$allSubjects,'instituteData' => $instituteData,'studentsData'=>$studentsData,'teacherSubject'=>$teacherSubject,'boardInstituteTeacher'=>$dataBIT]);
       
       
    }
}
