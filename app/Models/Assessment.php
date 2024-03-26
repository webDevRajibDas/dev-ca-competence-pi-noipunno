<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Assessment extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    public $table = 'assessments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'assessment_name_bn',
        'assessment_name_en',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_by', 'updated_by',
    ];

    public function assessment_details()
    {
        return $this->hasMany(AssessmentDetail::class, 'assessment_uid', 'uid')->select(['uid', 'assessment_uid', 'assessment_details_name_bn', 'assessment_details_name_en']);
    }
}
