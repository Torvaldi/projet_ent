<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function notes() {
        return $this->hasMany('App\Note');
    }

    public function tdgroups() {
        return $this->belongsTo('App\Tdgroup');
    }
}
