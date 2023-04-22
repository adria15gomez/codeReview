<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coevaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations_topics_coevaluations';
    protected $fillable = ['id_user_evaluated'];

    public function topics()
    {
        return $this->belongsTo(Topic::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
