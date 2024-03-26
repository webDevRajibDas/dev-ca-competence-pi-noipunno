<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Setting\PiClass;
use App\Models\Setting\Subject;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Bi extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    public $table = 'bis';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'uid',
        'bi_id',
        'name_en',
        'name_bn',
        'description',
        'class_uid',
        'subject_uid',
        'created_by',
        'updated_by',
        'chapter_id',
        'created_at',
        'updated_at',
        'session',
        'is_copied',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'
    ];

    public function class()
    {
        return $this->belongsTo(PiClass::class, 'class_uid', 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_uid', 'uid');
    }

    public function weights()
    {
        return $this->hasMany(BiWeight::class, 'bi_uid', 'uid');
    }

    public function similarBis()
    {
        return $this->belongsToMany(Bi::class, 'bi_similarities', 'bi_id', 'similar_bi_id');
    }

    public function similarToBis()
    {
        return $this->belongsToMany(Bi::class, 'bi_similarities', 'similar_bi_id', 'bi_id');
    }
}
