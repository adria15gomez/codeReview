<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $table = 'competences';
    protected $fillable = ['name', 'description'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
