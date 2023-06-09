<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];

    protected $fillable = ['name', 'trainer', 'start_date', 'end_date', 'evaluation1', 'evaluation2', 'evaluation3', 'evaluation4', 'zoom_url', 'slack_url'];

    public $timestamps = false;

    use HasFactory;

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
