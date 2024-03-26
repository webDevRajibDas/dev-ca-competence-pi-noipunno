<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class PiWeight extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    protected $with =['weights'];

    protected $fillable = [
        'uid',
        'competence_uid',
        'pi_uid',
        'guide_en',
        'guide_bn',
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

    public function competence()
    {
        return $this->belongsTo(Competence::class, 'competence_uid', 'uid');
    }

    public function pi()
    {
        return $this->belongsTo(Pi::class, 'pi_uid', 'uid');
    }

    public function weights()
    {
        return $this->hasMany(PiWeightGuideline::class, 'pi_weight_uid', 'uid')->select(['uid', 'pi_weight_uid', 'title_en', 'title_bn', 'description']);
    }
}
