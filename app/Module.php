<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function exams() {
        return $this->hasMany('App\Exam');
    }

    public function tdgroups() {
        return $this->belongsToMany('App\Tdgroup');
    }

    public function profs() {
        return $this->hasMany('App\User');
    }

    public function semester() {
        return $this->belongsTo('App\Semester');
    }
}
