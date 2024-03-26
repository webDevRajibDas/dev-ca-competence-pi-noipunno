<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubjectService\SubjectService;
use App\Services\ClassService\ClassService;

class SubjectController extends Controller
{
    private $subjectService;
    private $classService;

    public function __construct(SubjectService $subjectService, ClassService $classService)
    {
        $this->subjectService = $subjectService;
        $this->classService = $classService;
    }

    public function index()
    {
        $subjects = $this->subjectService->getAllSubjects();

        return view('subject.index', compact('subjects'));
    }

    public function subjectList(Request $request){
        $classValue = $request->query('class');
        $subjects = $this->subjectService->getSubjectByClass($classValue);
        return view('subject.subjectlist', compact('subjects','classValue'));
    }

    public function create()
    {
        $classes = $this->classService->getAllClasses();
        return view('subject.create', compact('classes'));
      

    }

    public function store(Request $request)
    {
        $subject = $this->subjectService->createSubject($request->all());
        return redirect()->route('subject');
    }

    public function edit($uid) {
        $subject = $this->subjectService->getSubjectById($uid);
        $classes = $this->classService->getAllClasses();
        return view('subject.edit', compact('subject', 'classes'));
    }

    public function update(Request $request, $uid) {
        $subject = $this->subjectService->updateSubject($uid, $request->all());
        return redirect()->route('subject');
    }

    public function destroy(Request $request, $uid) {
        $subject = $this->subjectService->deleteSubject($uid);
        return redirect()->route('subject');
    }

    public function chapterBySubject($uid) {
        $subject = $this->subjectService->getSubjectById($uid);
        $chapters = $subject->chapter;
        return response()->json($chapters);
    }

    public function classWiseSubject(Request $request) {
        if($request->class_id){
            $subjects = $this->subjectService->getSubjectByClass($request->class_id);
        }
        else{
            $subjects = [];
        }

        return response()->json($subjects);
    }

    public function subjectuid() {
        $subjects = $this->subjectService->getAllSubjects();

        foreach ($subjects as $subject) {
            $subject->uid = hexdec(uniqid());
            // Assuming you have a relationship method named 'class' in your Subject model
            $classUid = $subject->oldclass->uid;
            $subject->class_uid = $classUid;

            // Update class_uid
            $subject->save();
        }
        return redirect()->route('subject');

    }
}
