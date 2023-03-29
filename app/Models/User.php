<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
}
