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
        $sponsors = Sponsor::all();
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();

        return view('user.apartments.sponsorization', compact('apartment', 'sponsors', 'token') );
    }

    public function sponsorized_show(Apartment $apartment) {
        return view('user.apartments.sponsorized', compact('apartment'));
    }

    public function checkout(Request $request, Apartment $apartment){

    $mutable = Carbon::now();
    $sa = $request->all();

    if ($sa['amount'] == 2.99) {
        $sa['sponsor_id'] = 1;
        $modifiedMutable = $mutable->add(1, 'day');
    } 
    elseif ($sa['amount'] == 5.99) {
        $sa['sponsor_id'] = 2;
        $modifiedMutable = $mutable->add(3, 'day');
    } 
    else {
        $sa['sponsor_id'] = 3;
        $modifiedMutable = $mutable->add(6, 'day');
    };

    
    $apartment->sponsors()->attach(array($apartment->id => array(
        'sponsor_id' => $sa['sponsor_id'],
        'end_date' => $modifiedMutable
    )));





        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $_POST["amount"];
        $nonce = $_POST["payment_method_nonce"];


        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            // 'customer' => [
            //     'firstName' => $firstName,
            //     'lastName' => $lastName,
            //     'email' => $email
            // ]
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;

            return back()->with('success_message', 'Transaction successful. The ID is:  ' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: " . $baseUrl . "index.php");
            return back()->withErrors('An error occured with the message: ' . $result->message);
        }

        return view('user.apartments.sponsorization', compact('apartment'));
    }
}
