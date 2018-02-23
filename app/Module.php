<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function notes() {
        return $this->hasMany('App\Note');
    }

    public function tdgroups() {
        return $this->belongsToMany('App\Tdgroup');
    }

    public function profs() {
        return $this->hasMany('App\User');
    }
}
