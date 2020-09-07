<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;
use Braintree;

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

    public function checkout(Request $request, Apartment $apartment){


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

      $sponsor_apartment = $request->all();
      $new_Sponsor_A = [
        'apartment_id' => $apartment->id ,
        'sponsor_id' => $sponsor_apartment['sponsor_id'],
      ];
      $apartment->sponsors()->pivot()->sync($new_Sponsor_A, ['end_date' => 2021-03-04 ]);



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!





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
