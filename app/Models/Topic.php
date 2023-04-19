<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';
    protected $fillable = ['name', 'competence_id'];
    public $timestamp = false;

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($topic) {
            $topic->promotions()->update(['topic_id' => null]);
        });
    }
}
