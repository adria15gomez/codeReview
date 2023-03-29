<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'role', 'promotion_id'];

    public $timestamps = false;

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
}
