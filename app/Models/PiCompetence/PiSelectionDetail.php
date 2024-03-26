<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class PiSelectionDetail extends Model
{
    // protected $with =['pi'];

    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'pi_selection_uid',
        'pi_uid',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_by', 'updated_by', 'deleted_by'
    ];

    public function pi()
    {
        return $this->belongsTo(Pi::class, 'pi_uid', 'uid');
    }
}
