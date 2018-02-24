<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function module() {
        return $this->belongsTo('App\Module');
    }

    public function exam() {
        return $this->belongsTo('App\Exam');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
