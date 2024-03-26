<?php

namespace App\Repositories\AssessmentRepository;

use App\Models\Assessment;
use App\Models\AssessmentDetail;

class EloquentAssessmentRepository implements AssessmentRepository
{
    public function getAll()
    {
        return Assessment::on('mysql2')->select(['uid', 'assessment_name_bn', 'assessment_name_en'])->with('assessment_details')->get();
    }

    public function getDetailsById($uid)
    {
        return AssessmentDetail::on('mysql2')->where('assessment_uid',$uid)->get();
    }
}
