<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function tdgroups() {
        return $this->hasMany('App\Tdgroup');
    }
}
