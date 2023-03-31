<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoevaluation extends Model
{
    use HasFactory;

    protected $table = 'autoevaluations';

    public function topics()
    {
        return $this->belongsTo(Topic::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function coevaluations()
    {
        return $this->belongsToMany(Coevaluation::class)->withPivot('date');
    }
}
