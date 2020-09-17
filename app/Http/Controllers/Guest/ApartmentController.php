<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use App\Visualization;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ApartmentController extends Controller
{
    public function show($slug) {
        $apartments = Apartment::where('slug', $slug)->get();
        $apartment = $apartments[0];
        $ip = \Request::getClientIp();

        $not_visualized_apartments = Apartment::doesntHave('visualizations')->get();


            foreach ($not_visualized_apartments as $not_visualized_apartment) {
                if((Auth::id() !== $apartment->user_id)) {
                    if ($not_visualized_apartment->id == $apartment->id) {
                        $new_visualization = new Visualization();
                        $new_visualization['apartment_id'] = $apartment->id;
                        $new_visualization['visual_ip'] = $ip;
                        $new_visualization->save();
                    }
                }
            }


        if((Auth::id() !== $apartment->user_id)) {
            $last_ip_visualization = Apartment::join('visualizations', 'visualizations.apartment_id','=','apartments.id')->where('visualizations.apartment_id', '=', $apartment->id)->where('visual_ip','=', $ip)->orderBy('visualizations.created_at', 'desc')->first()->created_at;
            if(Carbon::now()->addHours(-24) > $last_ip_visualization ) {
                $new_visualization = new Visualization();
                $new_visualization['apartment_id'] = $apartment->id;
                $new_visualization['visual_ip'] = $ip;
                $new_visualization->save();
            }
        }

        $user = Auth::user();
        return view('guest.apartment.show', compact('apartment', 'user'));
    }


}
