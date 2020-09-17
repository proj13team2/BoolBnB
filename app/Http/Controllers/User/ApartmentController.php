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
use Carbon\Carbon;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //recupero la lista degli appartamenti per ciascun utente

        $mutable = Carbon::now();
        $user = Auth::id();

        $user_apartments = Apartment::with('services','address')->where('apartments.user_id', '=', $user)->orderBy('apartments.created_at', 'desc')->get();
        return view('user.apartments.index', compact('user_apartments', 'mutable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //passo i servizi disponibili per la creazione del nuovo appartamento
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
        //validazione degli input inseriti dall'utente
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
        
        //recupero tutti i dati
        $dati = $request->all();
        
        
        if(!$request->hasFile('src')) {
            $img_path = 'uploads/no-img.png';
            $dati['src'] = $img_path;
        }else {
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
           'slug' => slug_generator($dati)
       ];

       //creo un nuovo appartamento
        $new_apartment = new Apartment();
        $new_apartment->fill($dati_apartment);
        $new_apartment->save();

        //se ci sono servizi selezionati li salvo nel database
        if(!empty($dati['service_id'])) {
            $dati_apartment['service_id'] = $dati['service_id'];
            $new_apartment->services()->sync($dati_apartment['service_id']);
        }

        $dati_address = [
            'apartment_id' => $new_apartment->id,
            'street' => $dati['street'],
            'building_number' => $dati['building_number'],
            'city' => $dati['city'],
            'zip_code' => $dati['zip_code'],
            'region' => $dati['region'],
            'country' => $dati['country'],
            'lat' => $dati['lat'],
            'lng' => $dati['lng'],
        ];

        //creo un nuovo appartamento
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

        //recupero gli id degli appartamenti con sponsorizzazioni
        $apartment_sponsors = DB::table('apartment_sponsor')->select('apartment_id')->get();
        $sponsorized_apartments = [];
        $active = '';

        //creo un array con gli id (unici) degli appartamenti sponsorizzati
        foreach ( $apartment_sponsors  as $apartment_sponsor) {
            if (!in_array( $apartment_sponsor->apartment_id, $sponsorized_apartments)) {
                array_push($sponsorized_apartments, $apartment_sponsor->apartment_id );
            }
        }

        //verifico se l'appartmento è attualmente sponsorizzato (se si active = 1 altrimenti active = 0, useremo active nelle view)
        foreach ($apartment_sponsors  as $apartment_sponsor) {
            if (in_array($apartment_sponsor->apartment_id, $sponsorized_apartments)) {
                foreach($apartment->sponsors as $sponsor) {
                    if ($sponsor->pivot->end_date > Carbon::now()) {
                        $active = 1;
                    } else {
                        $active = 0;
                    }
                }
            } else {
                $active = 0;
            }
        }


            
        if($apartment) {
            return view('user.apartments.show', compact('apartment' , 'active'));
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
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'title' => 'required|max:255|unique:apartments,title,'.$apartment->id,
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
        
        
        //verifico se l'utente ha inserito un'immagine
        if($request->hasFile('src')) {

            //se l'ha inserita la salvo come nuova immagine dell'appartamento
           $img_path = Storage::put('uploads', $dati['src']);
           $dati['src'] = $img_path;
        } else {
            //altrimenti recupero l'immagine vecchia
            $dati['src'] = $apartment->src;
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
            'slug' => slug_generator($dati)
        ];

        $apartment->update($dati_apartment);

        //se l'utente ha inserito servizi
        if($request->has('service_id')) {
            //sincronizzo i servizi inseriti
            $dati_apartment['service_id'] = $dati['service_id'];
            $apartment->services()->sync($dati_apartment['service_id']);
        } else {
            //non ci sono servizi selezionati, svuoto i servizi dell'appartamento
            $apartment->services()->sync([]);
        }

        $dati_address = [
            'apartment_id' => $apartment->id,
            'street' => $dati['street'],
            'building_number' => $dati['building_number'],
            'city' => $dati['city'],
            'zip_code' => $dati['zip_code'],
            'region' => $dati['region'],
            'country' => $dati['country'],
            'lat' => $dati['lat'],
            'lng' => $dati['lng'],
        ];

        $new_address = $apartment->address;
        $new_address->update($dati_address);

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


    //funzione per disabilitare momentaneamente l'appartamento
    public function disable($id) {
        $apartment = Apartment::find($id);
        //verifico se l'appartamento è attivo o meno
        if($apartment->is_active == 1) {
            //lo rendo disattivo
            Apartment::where('id', $id)->update(array('is_active' => 0));
        } else {
            //altrimenti lo riattivo
            Apartment::where('id', $id)->update(array('is_active' => 1));
        }
        return redirect()->route('user.apartments.index');
    }
}

//funzione per generare lo slug
function slug_generator($dati) {

    $slug = Str::of($dati['title'])->slug('-');
    $slug_originale = $slug;

    $apartment_trovato = Apartment::where('slug', $slug)->first();
    $contatore = 0;
    while($apartment_trovato) {
        $contatore++;

        $slug = $slug_originale . '-' . $contatore;
        $apartment_trovato = Apartment::where('slug', $slug)->first();
    }

    return $slug;
}