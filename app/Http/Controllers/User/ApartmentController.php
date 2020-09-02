<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Address;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $user_apartments = Apartment::with('services','address')->where('apartments.user_id', '=', $user)->get();
        return view('user.apartments.index', compact('user_apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $dati = ['services' => $services];
        return view('user.apartments.create', $dati);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        $request->validate([
           'title' => 'required|max:255|unique:apartments,title',
           'street'=>'required|max:255',
            'building_number'=>'required',
            'city'=>'required|max:255',
            'zip_code'=>'required|numeric',
            'region'=>'required|max:255',
            'country'=>'required|max:255',
           'price' => 'required|numeric',
           'number_of_rooms' => 'required|numeric|between:1,10',
           'number_of_beds' => 'required|numeric|between:1,10',
           'number_of_bathrooms' => 'required|numeric|between:1,10',
           'square_meters' => 'required|numeric|min:1',
           'src' => 'image|max:1024'
        ]);

        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $slug_originale = $slug;

        $apartment_trovato = Apartment::where('slug', $slug)->first();
        $contatore = 0;
        while($apartment_trovato) {
            $contatore++;

            $slug = $slug_originale . '-' . $contatore;
            $apartment_trovato = Apartment::where('slug', $slug)->first();
        }

        if($dati['src']) {

           $img_path = Storage::put('uploads', $dati['src']);
           $dati['src'] = $img_path;
       }

       $dati_apartment = [
           'user_id' => Auth::id(),
           'title' => $dati['title'],
           'price' => $dati['price'],
           'number_of_rooms' => $dati['number_of_rooms'],
           'number_of_beds' => $dati['number_of_beds'],
           'number_of_bathrooms' => $dati['number_of_bathrooms'],
           'square_meters' => $dati['square_meters'],
           'src' => $dati['src'],
           'slug' => $slug,
       ];

       

        $new_apartment = new Apartment();
        $new_apartment->fill($dati_apartment);
        $new_apartment->save();
        $new_apartment->services()->sync($dati['service_id']);

        $dati_address = [
            'apartment_id' => $new_apartment->id,
            'street' => $dati['street'],
            'building_number' => $dati['building_number'],
            'city' => $dati['city'],
            'zip_code' => $dati['zip_code'],
            'region' => $dati['region'],
            'country' => $dati['country'],
        ];

        $new_address = new Address();
        $new_address->fill($dati_address);
        $new_address->save();

        return redirect()->route('user.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        if($apartment) {
            return view('user.apartments.show', compact('apartment'));
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);
        if ($apartment) {
            $services = Service::all();
            $dati = [
                'apartment' => $apartment,
                'services' => $services
            ];
            return view('user.apartments.edit', $dati);
        } else {
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'title' => 'required|max:255|unique:apartments,title,'.$id,
           'address' => 'required|max:255',
           'price' => 'required|numeric',
           'number_of_rooms' => 'required|numeric|between:1,10',
           'number_of_bathrooms' => 'required|numeric|between:1,10',
           'square_meters' => 'required|numeric|min:1',
           'src' => 'image|max:1024'
        ]);

        $dati = $request->all();
        $slug = Str::of($dati['title'])->slug('-');
        $slug_originale = $slug;

        $apartment_trovato = Apartment::where('slug', $slug)->first();
        $contatore = 0;
        while($apartment_trovato) {
            $contatore++;

            $slug = $slug_originale . '-' . $contatore;
            $apartment_trovato = Apartment::where('slug', $slug)->first();
        }

        if($dati['src']) {

           $img_path = Storage::put('uploads', $dati['src']);
           $dati['src'] = $img_path;
        } 


        $dati['slug'] = $slug;
        $dati['user_id'] = Auth::id();

        $new_apartment = Apartment::find($id);
        $new_apartment->update($dati);
        if(!empty($dati['service_id'])) {
            $new_apartment->services()->sync($dati['service_id']);
        } else {
            $new_apartment->services()->detach();
        }

        return redirect()->route('user.apartments.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        if($apartment) {
            $apartment->delete();
            return redirect()->route('user.apartments.index');
        } else {
            return abort('404');
        }
    }
}
