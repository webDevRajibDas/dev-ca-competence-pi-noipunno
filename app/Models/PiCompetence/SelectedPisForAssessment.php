<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class SelectedPisForAssessment extends Model
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
        'pi_selection_for_assessment_uid',
        'pi_uid',
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
}
