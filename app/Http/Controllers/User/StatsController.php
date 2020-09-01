<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Visualization;

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
        // $apartment = Apartment::find($id);{
            return view('user.apartments.stats', compact('visualizations'));
        // $user_apartment = Apartment::all();
        // $visualizations = Visualization::all();
        // $apartment_stats = DB::table('')
        // $visualizations = DB::table('visualizations')->where('apartment_id', '=', $user_apartment);

    }

}



//QUERY PER LA SELEZIONE DELLE SPONSORIZZAZIONI
// SELECT * FROM sponsors
// JOIN apartment_sponsor
// ON sponsors.id = apartment_sponsor.sponsor_id 
// JOIN apartments ON apartment_sponsor.apartment_id = apartments.id
// WHERE apartments.id = 