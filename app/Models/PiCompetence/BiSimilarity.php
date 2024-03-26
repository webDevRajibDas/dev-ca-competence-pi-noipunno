<?php

namespace App\Models\PiCompetence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiSimilarity extends Model
{
    use HasFactory;

    public function bi1()
    {
        return $this->belongsTo(Bi::class, 'bi_id');
    }

    public function bi2()
    {
        return $this->belongsTo(Bi::class, 'similar_bi_id');
    }
}
