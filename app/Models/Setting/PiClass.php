<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class PiClass extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'class_id',
        'name_en',
        'name_bn',
        'version',
        'class_code',
        'created_by', 
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_by', 'updated_by',
    ];

    public function subject()
    {
        return $this->hasMany(Subject::class, 'class_id', 'id');
    }
}
