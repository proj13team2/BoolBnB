<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Message;

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
        return $this->belongsToMany('App\Sponsor')->withPivot('end_date','is_active');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    protected $fillable = ['user_id','title', 'address', 'price', 'number_of_rooms', 'number_of_beds', 'number_of_bathrooms', 'square_meters', 'src', 'slug', 'address_lat', 'address_lng'];
}
