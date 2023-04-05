<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';
    public $timestamp = false;

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function promotions()
    {
        return $this->belongsTo(Promotion::class);
    }
}
