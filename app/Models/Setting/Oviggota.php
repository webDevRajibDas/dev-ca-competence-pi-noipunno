<?php

namespace App\Models\Setting;

use App\Models\OviggotaToPi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Oviggota extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'oviggota_no',
        'oviggota_title',
        'class_id',
        'subject_uid',
        'session',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_copied',
        'session',
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
        return $this->hasMany(OviggotaToPi::class, 'oviggota_uid', 'uid');
    }
}
