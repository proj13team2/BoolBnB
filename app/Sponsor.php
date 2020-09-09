<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Sponsor extends Model
{
    public function apartments() {
        return $this->belongsToMany('App\Apartment')->withPivot('end_date','is_active'); {
        };
    }
}
