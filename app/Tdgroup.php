<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tdgroup extends Model
{
    public function tpgroups() {
        return $this->hasMany('App\Tpgroup');
    }

    public function semester() {
        return $this->belongsTo('App\Semester');
    }
}
