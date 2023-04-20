<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Access\Authorizable;




class User extends Authenticatable implements Authorizable
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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissions_roles_users', 'users_id', 'roles_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles_users', 'users_id', 'permissions_id');
    }

    public static function create(array $attributes = [])
    {
        static::unguard();

        $attributes['role'] = 'coder';

        if (static::count() === 0) {
            $attributes['role'] = 'admin';
        } elseif (strpos($attributes['email'], '@factoriaf5.org') !== false) {
            $attributes['role'] = 'trainer';
        }

        static::reguard();

        return tap(new static($attributes), function ($instance) {
            $instance->save();
        });
    }
}
