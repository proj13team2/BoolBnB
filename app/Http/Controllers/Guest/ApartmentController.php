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

    // ---------- SHOW: mostra i dettagli del singolo appartmento (GUEST) ---------- //

    public function show($slug) {

        $apartments = Apartment::where('slug', $slug)->get();

        //prendo il primo ed unico elemento dell'array generato dalla query precedente (lo slug è unico!)
        $apartment = $apartments[0];

        //recupero l'ip del guest
        $ip = \Request::getClientIp();

        $not_visualized_apartments = Apartment::doesntHave('visualizations')->get();

        //se l'appartamento non è mai stato visualizzato
        foreach ($not_visualized_apartments as $not_visualized_apartment) {
            //controllo se l'utente loggato non è il proprietario dell'appartamento
            if((Auth::id() !== $apartment->user_id)) {
                //se non lo è conto una visualizzazione 
                if ($not_visualized_apartment->id == $apartment->id) {
                    create_visualization($apartment, $ip);
                }
            }
        }

        //se l'appartamento ha già visualizzazioni
        if((Auth::id() !== $apartment->user_id)) {

            //recupero l'ultima visualizzazione
            $last_ip_visualization = Apartment::join('visualizations', 'visualizations.apartment_id','=','apartments.id')->where('visualizations.apartment_id', '=', $apartment->id)->orderBy('visualizations.created_at', 'desc')->first()->created_at;
            
            //solo se sono passate più di 24h conto l'ulteriore visualizzazione
            if(Carbon::now()->addHours(-24) > $last_ip_visualization ) {
                create_visualization($apartment, $ip);
            }
        }

        $user = Auth::user();
        return view('guest.apartment.show', compact('apartment', 'user'));
    }

}

function create_visualization($apartment, $ip) {
    $new_visualization = new Visualization();
    $new_visualization['apartment_id'] = $apartment->id;
    $new_visualization['visual_ip'] = $ip;
    $new_visualization->save();
}
