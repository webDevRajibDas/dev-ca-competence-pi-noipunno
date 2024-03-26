<?php

namespace App\Models;
use App\Models\PiCompetence\Pi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class DimensionToPi extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;
    protected $with =['pi'];
    protected $fillable = [
        'uid',
        'dimension_uid',
        'pi_uid',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];
    public function pi()
    {
        return $this->belongsTo(Pi::class, 'pi_uid', 'uid');
    }
}
