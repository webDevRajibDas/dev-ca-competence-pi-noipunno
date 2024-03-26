<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Setting\PiClass;
use App\Models\Setting\Subject;
use App\Models\Setting\Chapter;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Competence extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    public $table = 'competences';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'competence_id',
        'name_en',
        'name_bn',
        'details_bn',
        'details_en',
        'session',
        'start_date',
        'end_date',
        'status',
        'class_uid',
        'subject_uid',
        'chapter_uid',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_copied',
    ];

    protected $hidden = [
        'created_by', 'updated_by',
    ];


    public function class()
    {
        return $this->belongsTo(PiClass::class, 'class_uid', 'class_id');
    }

    public function oldclass()
    {
        return $this->belongsTo(PiClass::class, 'class_id', 'id');
    }

    public function uidpis()
    {
        return $this->hasMany(Pi::class, 'competence_id', 'id');
    }

    public function pis()
    {
        return $this->hasMany(Pi::class, 'competence_uid', 'uid')->select(['uid', 'pi_id', 'pi_no', 'chapter_uid', 'name_en', 'name_bn', 'description', 'competence_uid']);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_uid', 'uid');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_uid', 'uid');
    }

    public function oldsubject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
