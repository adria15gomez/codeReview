<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function autoevaluation()
    {
        return $this->belongsToMany(Topic::class, 'evaluations_topics_autoevaluations')->withPivot('level', 'promedio');
    }

    public function coevaluation()
    {
        return $this->belongsToMany(Topic::class, 'evaluations_topics_coevaluations')->withPivot('level', 'promedio');
    }
}
