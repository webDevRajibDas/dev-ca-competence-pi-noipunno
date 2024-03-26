<?php

namespace App\Http\Controllers\Setting;

use App\Models\OviggotaToPi;
use Illuminate\Http\Request;
use App\Models\OviggotaToChapter;
use App\Http\Controllers\Controller;
use App\Services\ClassService\ClassService;
use App\Services\SubjectService\SubjectService;
use App\Services\OviggotaService\OviggotaService;
use App\Http\Requests\Oviggota\CopyOviggotaRequest;

class OviggotaController extends Controller
{
    private $classService;
    private $subjectService;
    private $oviggotaService;

    public function __construct(OviggotaService $oviggotaService, SubjectService $subjectService, ClassService $classService)
    {
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->oviggotaService = $oviggotaService;
    }

    public function index(Request $request)
    {
        $classes = $this->classService->getAllClasses();
        $subjects = $this->subjectService->getAllSubjects();
        $oviggotas = $this->oviggotaService->getAllOviggotaByYear(date('Y'));
        return view('oviggota.index', compact('classes', 'subjects', 'oviggotas'));
    }

    public function create()
    {
        $classes = $this->classService->getAllClasses();
        return view('oviggota.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $oviggota = $this->oviggotaService->createOviggota($request->all());
        if ($request->chapter_uid) {
            foreach ($request->chapter_uid as $key => $item) {
                $data_chapter = new OviggotaToChapter();
                $data_chapter->oviggota_uid = $oviggota->uid;
                $data_chapter->chapter_uid = $key;
                $data_chapter->save();
            }
        }
        foreach ($request->pi_uid as $key => $item) {
            $data_pi = new OviggotaToPi();
            $data_pi->oviggota_uid = $oviggota->uid;
            $data_pi->pi_uid = $key;
            $data_pi->save();
        }

        return redirect()->route('oviggota');
    }

    public function edit($uid)
    {
        $oviggota = $this->oviggotaService->getOviggotaById($uid);
        $classes = $this->classService->getAllClasses();
        return view('oviggota.edit', compact('classes', 'oviggota'));
    }

    public function update(Request $request, $uid)
    {
        $oviggota = $this->oviggotaService->updateOviggota($uid, $request->all());

        if ($request->chapter_uid) {
            OviggotaToChapter::where('oviggota_uid', $oviggota->uid)->delete();
            foreach ($request->chapter_uid as $key => $item) {
                $data_chapter = new OviggotaToChapter();
                $data_chapter->oviggota_uid = $oviggota->uid;
                $data_chapter->chapter_uid = $key;
                $data_chapter->save();
            }
        }
        OviggotaToPi::where('oviggota_uid', $oviggota->uid)->delete();
        foreach ($request->pi_uid as $key => $item) {
            $data_pi = new OviggotaToPi();
            $data_pi->oviggota_uid = $oviggota->uid;
            $data_pi->pi_uid = $key;
            $data_pi->save();
        }
        return redirect()->route('oviggota');
    }

    public function destroy(Request $request, $uid)
    {
        OviggotaToChapter::where('oviggota_uid', $uid)->delete();
        OviggotaToPi::where('oviggota_uid', $uid)->delete();
        $oviggota = $this->oviggotaService->deleteOviggota($uid);
        return redirect()->route('oviggota');
    }

    public function copyOviggota(Request $request)
    {
        $oviggotas  = $this->oviggotaService->getAllOviggotasByPagination($request);
        $classes    = $this->classService->getAllClasses();
        $subjects   = $this->subjectService->getAllSubjects();
        // dd($oviggotas->toArray());

        return view('oviggota.copy', compact('classes', 'subjects', 'oviggotas'));
    }

    public function copyOviggotaStore(CopyOviggotaRequest $request)
    {

        $response = $this->oviggotaService->copyOviggotaStore($request);
        if ($response) {
            $notification = array(
                'message' => 'Oviggota Copied Successfully!!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message' => 'Oviggota Does not Copied!!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
}
