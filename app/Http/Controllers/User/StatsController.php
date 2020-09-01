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
    public function show()
    {
        $apartment = Apartment::find($id);
        if($apartment) {
            $visualizations = $apartment->visualizations;
            $data = [
                'apartment' => $apartment,
                'visualizations' => $visualizations
            ];
            return view('user.apartments.stats', $data);
        } else {
            return abort('404');
        }
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