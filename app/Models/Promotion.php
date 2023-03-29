<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = ['name', 'trainer', 'start_date', 'end_date', 'topic_id', 'evaluation1', 'evaluation2', 'evaluation3', 'evaluation4', 'zoom_url', 'slack_url'];

    public $timestamps = false;

    use HasFactory;

    public function competence()
    {
        //return $this->belongsTo(Competence::class);
        return $this->hasMany(Competence::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
