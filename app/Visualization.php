<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visualization extends Model
{

    protected $table = 'visualizations';
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
    protected $fillable = ['apartment_id','visual_ip'];

}
