<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\CreatedUId;
use App\Traits\CreatedUpdatedBy;

class Pi extends Model
{
    use HasFactory, SoftDeletes;
    use CreatedUId;
    use CreatedUpdatedBy;

    public $table = 'pis';

    // protected $with =['pi_weight', 'pi_attribute'];
    protected $with =['pi_attribute'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'pi_id',
        'pi_no',
        'chapter_uid',
        'name_en',
        'name_bn',
        'description',
        'competence_uid',
        'created_by',
        'updated_by',
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
    public function comkipetence()
    {
        return $this->belongsTo(PiWeight::class, 'pi_uid', 'uid');
    }

    public function picompetence()
    {
        return $this->belongsTo(Competence::class, 'competence_id', 'id');
    }

    public function pi_weights()
    {
        return $this->hasOne(PiWeight::class, 'pi_uid', 'uid');
    }

    public function pi_weight()
    {
        return $this->hasOne(PiWeight::class, 'pi_uid', 'uid')->select(['uid', 'pi_uid', 'guide_en', 'guide_bn', 'description']);
    }

    public function similarPis()
    {
        return $this->belongsToMany(Pi::class, 'pi_similarities', 'pi_id', 'similar_pi_id');
    }

    public function similarToPis()
    {
        return $this->belongsToMany(Pi::class, 'pi_similarities', 'similar_pi_id', 'pi_id');
    }

    public function pi_attribute()
    {
        return $this->hasMany(PiAttribute::class, 'pi_uid', 'uid')->select(['uid', 'pi_uid', 'weight_uid', 'title_en', 'title_bn', 'description']);
    }

}
