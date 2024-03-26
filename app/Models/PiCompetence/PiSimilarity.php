<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiSimilarity extends Model
{
    use HasFactory;

    public function pi1()
    {
        return $this->belongsTo(Pi::class, 'pi_id');
    }

    public function pi2()
    {
        return $this->belongsTo(Pi::class, 'similar_pi_id');
    }
}
