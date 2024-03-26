<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeightService\WeightService;

class WeightController extends Controller
{
    private $weightService;

    public function __construct(WeightService $weightService)
    {
        $this->weightService = $weightService;
    }

    public function index()
    {
        $weights = $this->weightService->getAllWeights();
        return view('pi_weight.index', compact('weights'));
    }

    public function create()
    {
        return view('pi_weight.create');
    }

    public function store(Request $request)
    {
        $uid = mt_rand(100000000, 999999999);
        $request->merge(['uid' => $uid]);
        $class = $this->weightService->createWeight($request->all());
        return redirect()->route('weight');
    }

    public function edit($uid) {
        $weight = $this->weightService->getWeightById($uid);
        return view('pi_weight.edit', compact('weight'));
    }

    public function update(Request $request, $uid) {
        $weight = $this->weightService->updateWeight($uid, $request->all());
        return redirect()->route('weight');
    }

    public function destroy(Request $request, $uid) {
        $weight = $this->weightService->deleteWeight($uid);
        return redirect()->route('weight');
    }
}
