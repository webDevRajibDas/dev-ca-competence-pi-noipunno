<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Poricched extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'poricched_no',
        'poricched_title',
        'class_id',
        'subject_uid',
        'chapter_uid',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];
}
