<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function responses() {
        return $this->hasMany('App\Response');
    }
}
