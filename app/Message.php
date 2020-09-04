<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Message extends Model
{
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }

    protected $fillable = ['apartment_id','email', 'content'];
}
