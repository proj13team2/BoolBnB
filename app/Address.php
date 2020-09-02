<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Address extends Model
{
    public function apartment()
    {
    return $this->belongsTo('App\Apartment'); 
    }

    protected $fillable = [ 'apartment_id','street', 'building_number', 'city', 'zip_code', 'region', 'country',  'lat', 'lng'];
}
