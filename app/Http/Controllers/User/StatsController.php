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
    
    //function to get the months from the db
    public function getMonth(){
        $monthArray = [];
        $monthsMessage = Message::orderby('created_at', 'ASC')->pluck('created_at');
        if(!empty($monthMessage)) {
            foreach ($monthsMessage as $month){
                $month->date->format('M');
                return $month;
            }
        }
    }

    //function to get the messages(count) x month
    public function getData(){

    }

}



//QUERY PER LA SELEZIONE DELLE SPONSORIZZAZIONI
// SELECT * FROM sponsors
// JOIN apartment_sponsor
// ON sponsors.id = apartment_sponsor.sponsor_id 
// JOIN apartments ON apartment_sponsor.apartment_id = apartments.id
// WHERE apartments.id = 