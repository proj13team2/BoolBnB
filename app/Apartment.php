<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function visualizations() {
        return $this->hasMany('App\Visualization');
    }

    public function services() {
        return $this->belongsToMany('App\Service');
    }

    public function sponsors() {
        return $this->belongsToMany('App\Sponsor');
    }
}
