<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function isAdministrator() {
        return $this->role->role == 'administrator';
    }

    public function isAdmin() {
        return $this->role->role == 'admin';
    }

    public function isAgent() {
        return $this->role->role == 'agent';
    }

    public function isClient() {
        return $this->role->role == 'client';
    }

    public function client() {
        return $this->hasOne(Client::class);
    }

    /**
     * chat
     */
    public function messages(){
        return $this->hasMany(Messages::class);
    }
}
