<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user() {
        return $this->hasMany('App\User');
    }
}
