<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ClassService\ClassService;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;

class ClassController extends Controller
{
    use ApiResponser;
    private $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    public function index()
    {
        $classes = $this->classService->getAllClasses();

        // if (isApi()) {
        //     try {
        //         return $this->successResponse($classes, Response::HTTP_OK);
        //     } catch (\Throwable $th) {
        //         $d['error'] = 'Something Wrong!';
        //         return response()->json($d);
        //     }
        // }

        return view('class.index', compact('classes'));
    }

    public function create()
    {
        return view('class.create');
    }

    public function store(Request $request)
    {
        $class = $this->classService->createClass($request->all());
        return redirect()->route('class');
    }

    public function edit($uid) {
        $class = $this->classService->getClassById($uid);
        return view('class.edit', compact('class'));
    }

    public function update(Request $request, $uid) {
        $class = $this->classService->updateClass($uid, $request->all());
        return redirect()->route('class');
    }

    public function destroy(Request $request, $uid) {
        $class = $this->classService->deleteClass($uid);
        return redirect()->route('class');
    }

    public function classuid() {
        $records = $this->classService->getAllClasses();

        foreach ($records as $record) {
            $record->uid = hexdec(uniqid()); // Set the new UID value here
            $record->save();
        }
        return redirect()->route('class');
    }

}
