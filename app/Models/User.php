<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Access\Authorizable;




class User extends Authenticatable implements Authorizable, MustVerifyEmail

{
    use HasFactory, Notifiable, AuthenticableTrait;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'role', 'promotion_id'];

    public $timestamps = false;

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class, 'evaluation_id');
    }

    public function setPasswordAtributte($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
