<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Subject extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'subject_id',
        'name',
        'class_uid',
        'version',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];


    public function class()
    {
        return $this->belongsTo(PiClass::class, 'class_uid', 'class_id');
    }

    public function oldclass()
    {
        return $this->belongsTo(PiClass::class, 'class_id', 'id');
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'subject_uid', 'uid');
    }

}
