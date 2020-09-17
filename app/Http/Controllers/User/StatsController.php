<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Visualization;
use App\Message;

class StatsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {
        $visualizations = $apartment->visualizations;
        $data = [
            'apartment' => $apartment,
            'visualizations' => $visualizations
        ];
        return view('user.apartments.stats', $data);
    }
}
