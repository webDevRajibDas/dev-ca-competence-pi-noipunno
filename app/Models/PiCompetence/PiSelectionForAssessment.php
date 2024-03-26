<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class PiSelectionForAssessment extends Model
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
        'class_uid',
        'subject_uid',
        'assessment_type',
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


    public function pis() {
        return $this->hasMany(SelectedPisForAssessment::class, 'pi_selection_for_assessment_uid', 'uid');
    }
}
