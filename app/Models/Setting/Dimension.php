<?php

namespace App\Models\Setting;
use App\Models\DimensionToPi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Dimension extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'dimension_no',
        'dimension_title',
        'dimension_details',
        'class_id',
        'subject_uid',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'session',
        'is_copied',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];
    public function class()
    {
        return $this->belongsTo(PiClass::class, 'class_id', 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_uid', 'uid');
    }
    public function pis()
    {
        return $this->hasMany(DimensionToPi::class, 'dimension_uid', 'uid');
    }
}
