<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpgroup extends Model
{
    public function users() {
        return $this->hasMany('App\User');
    }

    public function tdgroup() {
        return $this->belongsTo('App\Tdgroup');
    }
}
