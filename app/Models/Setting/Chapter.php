<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Chapter extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    public $table = 'chapters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'name',
        'chapter_id',
        'class_uid',
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
        'created_by', 'updated_by',
    ];


    public function class()
    {
        return $this->belongsTo(PiClass::class, 'class_uid', 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_uid', 'uid');
    }

    public function poriccheds()
    {
        return $this->hasMany(Poricched::class, 'chapter_uid', 'uid');
    }
}
