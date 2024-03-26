<?php

namespace App\Models;
use App\Models\PiCompetence\Bi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class BiDimensionToBi extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;
    protected $with =['bi'];
    protected $fillable = [
        'uid',
        'bi_dimension_uid',
        'bi_uid',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'
    ];
    // public function bi()
    // {
    //     return $this->belongsTo(Bi::class, 'bi_uid', 'uid');
    // }
    public function bi()
    {
        return $this->belongsTo(Bi::class, 'bi_uid', 'uid');
    }
}
