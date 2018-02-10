<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function users() {
        return $this->hasMany('App\User');
    }
}
