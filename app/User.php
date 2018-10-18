<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'series', 'name', 'department', 'mobile', 'email', 'password', 'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
        protected $casts = [
        'admin' => 'boolean',
        'valid' => 'boolean',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }
    
    public function isValid()
    {
        return $this->valid;
    }
}
