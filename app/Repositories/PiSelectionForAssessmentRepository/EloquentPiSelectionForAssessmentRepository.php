<?php

namespace App\Repositories\PiSelectionForAssessmentRepository;

use Illuminate\Support\Facades\DB;

use App\Models\PiCompetence\PiSelectionForAssessment;
use App\Models\PiCompetence\SelectedPisForAssessment;

class EloquentPiSelectionForAssessmentRepository implements PiSelectionForAssessmentRepository
{
    public function getAll()
    {
        return PiSelectionForAssessment::on('mysql2')->get();
    }

    public function getById($uid)
    {
        return PiSelectionForAssessment::on('mysql2')->where('uid',$uid)->first();
    }

    public function create($data)
    {
        try {
            DB::beginTransaction();
            $assesment = PiSelectionForAssessment::create($data);
            foreach($data['pi'] as $pi) {
                $piData['pi_uid'] = $pi;
                $piData['pi_selection_for_assessment_uid'] = $assesment->uid;
                SelectedPisForAssessment::create($piData);
            }
            DB::commit();

            return $assesment;
        } catch (Exception $e) {
                        DB::rollback();
            return $e->getMessage();
        }

    }

    public function update($uid, $data)
    {
        $piAssessment = PiSelectionForAssessment::where('uid',$uid)->first();
        $piAssessment->update($data);
    }

    public function delete($uid)
    {
        $piAssessment = PiSelectionForAssessment::where('uid',$uid)->first();
        $piAssessment->pis()->delete();
        $piAssessment->delete();
    }
}
