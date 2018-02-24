<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function prof() {
        return $this->belongsTo('App\User');
    }

    public function notes() {
        return $this->hasMany('App\Note');
    }

    public function module() {
        return $this->belongsTo('App\Module');
    }
}
