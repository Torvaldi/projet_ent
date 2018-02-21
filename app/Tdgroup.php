<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tdgroup extends Model
{
    public function tpgroups() {
        return $this->hasMany('App\Tpgroup');
    }

    public function users() {
        return $this->hasManyThrough('App\User', 'App\Tpgroup');
    }

    public function promotion() {
        return $this->belongsTo('App\Promotion');
    }
}
