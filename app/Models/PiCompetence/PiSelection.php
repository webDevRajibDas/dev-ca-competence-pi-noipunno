<?php

namespace App\Models\PiCompetence;

use App\Models\AssessmentDetail;
use App\Models\Setting\PiClass;
use App\Models\Setting\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class PiSelection extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'class_id',
        'subject_uid',
        'assessment_type',
        'session',
        'submit_status',
        'approval_status',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_by', 'updated_by', 'deleted_by'
    ];

    public function class()
    {
        return $this->belongsTo(PiClass::class, 'class_id', 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_uid', 'uid');
    }
    public function assessmentType()
    {
        return $this->belongsTo(AssessmentDetail::class, 'assessment_type', 'uid');
    }
    public function pi_list()
    {
        return $this->hasMany(PiSelectionDetail::class, 'pi_selection_uid', 'uid');
    }
}
