<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

use App\Models\Setting\Weight;

class PiWeightGuideline extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $fillable = [
        'uid',
        'pi_weight_uid',
        'weight_uid',
        'title_en',
        'title_bn',
        'description',
        'created_by', 
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_by', 'updated_by',
    ];

    public function weight()
    {
        return $this->belongsTo(Weight::class, 'weight_uid', 'uid');
    }
}
