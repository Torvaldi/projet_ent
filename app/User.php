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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles) {
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    public function hasRole($role) {
        return null !== $this->roles()->where('name', $role)->where('active', 1)->first();
    }

    public function promotion() {
        return $this->belongsTo('App\Promotion');
    }

    public function tpgroup() {
        return $this->belongsTo('App\Tpgroup');
    }

    public function notes() {
        return $this->hasMany('App\Note');
    }

    public function semester() {
        return $this->belongsTo('App\Semester');
    }
}
