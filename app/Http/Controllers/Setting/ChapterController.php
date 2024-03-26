<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Models\OviggotaToChapter;
use App\Models\Setting\Poricched;
use App\Http\Controllers\Controller;
use App\Services\ClassService\ClassService;
use App\Services\ChapterService\ChapterService;
use App\Services\SubjectService\SubjectService;
use App\Http\Requests\Chapter\CopyChapterRequest;

class ChapterController extends Controller
{
    private $chapterService;
    private $classService;
    private $subjectService;

    public function __construct(ChapterService $chapterService, SubjectService $subjectService, ClassService $classService)
    {
        $this->chapterService = $chapterService;
        $this->classService = $classService;
        $this->subjectService = $subjectService;
    }

    public function index(Request $request)
    {
        $chapters = $this->chapterService->getAllChapters();

        if ($request->has('class_uid')) {
            $chapters = $this->chapterService->getAllChapters()->where('class_uid', $request->class_uid);
        }

        if ($request->has('subject_uid')) {
            $chapters = $this->chapterService->getAllChapters()->where('subject_uid', $request->subject_uid);
        }

        if ($request->has('class_uid') && $request->has('subject_uid')) {
            $chapters = $this->chapterService->getAllChapters()->where('class_uid', $request->class_uid)->where('subject_uid', $request->subject_uid);
        }

        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        return view('chapter.index', compact('chapters', 'classes', 'subjects'));
    }

    public function create()
    {
        $classes = $this->classService->getAllClasses();
        return view('chapter.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $chapter = $this->chapterService->createChapter($request->all());
        if ($request->poricched_no) {
            foreach ($request->poricched_no as $key_item => $item) {
                if ($request->poricched_title[$key_item]) {
                    $data = new Poricched();
                    $data->chapter_uid = $chapter->uid;
                    $data->class_id = $chapter->class_uid;
                    $data->subject_uid = $chapter->subject_uid;
                    $data->poricched_no = $request->poricched_no[$key_item];
                    $data->poricched_title = $request->poricched_title[$key_item];
                    $data->save();
                }
            }
        }
        return redirect()->route('chapter');
    }

    public function edit($uid)
    {
        $chapter = $this->chapterService->getChapterById($uid);
        $classes = $this->classService->getAllClasses();
        $poriccheds = Poricched::where('chapter_uid', $chapter->uid)->get();
        return view('chapter.edit', compact('classes', 'chapter', 'poriccheds'));
    }

    public function update(Request $request, $uid)
    {
        $chapter = $this->chapterService->updateChapter($uid, $request->all());

        if (!$request->poricched_uid) {
            $request->poricched_uid = [];
        }
        Poricched::where('chapter_uid', $chapter->uid)->whereNotIn('uid', @$request->poricched_uid)->delete();

        foreach ($request->poricched_title as $key_item => $item) {
            $exist = Poricched::where('uid', @$request->poricched_uid[$key_item])->first();
            if ($exist) {
                $poricched_data = $exist;
            } else {
                $poricched_data = new Poricched();
            }
            $poricched_data->chapter_uid = $chapter->uid;
            $poricched_data->class_id = $chapter->class_uid;
            $poricched_data->subject_uid = $chapter->subject_uid;
            $poricched_data->poricched_no = $request->poricched_no[$key_item];
            $poricched_data->poricched_title = $request->poricched_title[$key_item];

            $poricched_data->save();
            $null_poricched_check = Poricched::where('chapter_uid', $chapter->uid)->where('uid', $poricched_data->uid)->first();
            if ($null_poricched_check->poricched_title == null) {
                $null_poricched_check->delete();
            }
        }
        return redirect()->route('chapter');
    }

    public function destroy(Request $request, $uid)
    {
        $chapter = $this->chapterService->deleteChapter($uid);
        return redirect()->route('chapter');
    }

    public function subjectWiseChapter(Request $request)
    {
        if ($request->subject_id) {
            $data['chapters']         = $this->chapterService->getChapterBySubjectId($request->subject_id);
            $data['selected_chapter'] = OviggotaToChapter::where('oviggota_uid', $request->edit_id)->pluck('chapter_uid')->toArray();
        }

        return response()->json($data);
    }

    public function copyChapter(Request $request)
    {
        $chapters = $this->chapterService->getChapterByPagination($request);
        $classes  = $this->classService->getAllClasses();
        return view('chapter.copy', compact('chapters', 'classes'));
    }


    public function copyChapterStore(CopyChapterRequest $request)
    {


        $response = $this->chapterService->copyChapterStore($request);
        if ($response) {
            $notification = array(
                'message'       => 'Chapter Copied Successfully!!',
                'alert-type'    => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message'       => 'Chapter Does not Copied!!',
            'alert-type'    => 'error'
        );
        return back()->with($notification);
    }
}
