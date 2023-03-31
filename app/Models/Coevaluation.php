<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coevaluation extends Model
{
    use HasFactory;

    protected $table = 'coevaluations';

    public function topics()
    {
        return $this->belongsTo(Topic::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
