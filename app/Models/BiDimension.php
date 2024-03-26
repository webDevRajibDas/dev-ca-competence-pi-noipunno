<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class BiDimension extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'dimension_no',
        'dimension_title',
        'dimension_details',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'session',
        'is_copied',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'
    ];
    public function bi_dimension()
    {
        return $this->hasMany(BiDimensionToBi::class, 'bi_dimension_uid', 'uid')->select('uid', 'bi_dimension_uid', 'bi_uid');
    }

    public function bis() {

        return $this->hasMany(BiDimensionToBi::class,'bi_dimension_uid','uid');
    }
}
