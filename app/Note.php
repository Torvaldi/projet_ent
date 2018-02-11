<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function module() {
        return $this->belongsTo('App\Module');
    }
}
