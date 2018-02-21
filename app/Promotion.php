<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function tdgroups() {
        return $this->hasMany('App\Tdgroup');
    }
}
