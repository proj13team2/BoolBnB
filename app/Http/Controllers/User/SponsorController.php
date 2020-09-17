<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;
use Braintree;
use Carbon\Carbon;

class SponsorController extends Controller
{
    public function show(Apartment $apartment){

      $mutable = Carbon::now();
      $sponsors = Sponsor::all();

      //recupero i dati necessari per braintree
      $gateway = new Braintree\Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
      ]);

      $token = $gateway->ClientToken()->generate();

      //creo un array da riempire con la sponsorizzazione attuale dell'appartamento (se esiste)
      $array_sponsorizzati_attuali = [];
            foreach ($apartment->sponsors as $sponsor) {
                if($sponsor->pivot->end_date > Carbon::now()) {
                    array_push($array_sponsorizzati_attuali, $sponsor);
                }
            }
    
      return view('user.apartments.sponsorization', compact('apartment', 'sponsors','array_sponsorizzati_attuali', 'token') );
    }


    public function checkout(Request $request, Apartment $apartment, Sponsor $sponsor){

        $time_now = Carbon::now();
        $mutable = Carbon::now();
        $active = '';
        $dati = $request->all();
        $sponsor = Sponsor::find($dati['amount']);
        $sponsor_price = $sponsor['price'];

        //verifichiamo il prezzo della sponsorizzazione e definiamo l'end_date
        if ($sponsor_price == 2.99) {
            $modifiedMutable = $mutable->add(1, 'day');
        }
        elseif ($sponsor_price == 5.99) {
            $modifiedMutable = $mutable->add(3, 'day');
        }
        else {
            $modifiedMutable = $mutable->add(6, 'day');
        };

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $sponsor_price;
        $nonce = $_POST["payment_method_nonce"];

        //restituzione del risultato di braintree
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        //per ogni sponsorizzazione controllo la data di scadenza
        foreach($apartment->sponsors as $sponsor) {
            
            if( $sponsor->pivot->end_date <= Carbon::now()) {
                //se è scaduta
                $active = 0;
            } else {
                $active = 1;
                return redirect()->route('user.apartments.show', compact('apartment', 'active', 'time_now'));
            }
        }

        if ($result->success) {
            $apartment->sponsors()->attach(array($apartment->id => array(
                'sponsor_id' => $dati['amount'],
                'end_date' => $modifiedMutable,
            )));
    
            return redirect()->route('user.apartments.show', compact('apartment', 'active', 'time_now'));
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An error occured with the message: ' . $result->message);
        }
    }
}
