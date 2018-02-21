<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpgroup extends Model
{
    public function users() {
        return $this->hasManyThrough('App\User', 'App\Tdgroup');
    }

    public function tdgroup() {
        return $this->belongsTo('App\Tdgroup');
    }
}
