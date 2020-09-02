<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Apartment;


class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $datas = [
            [
                'user_id'=>'1',
                'title' =>'Corte Milanese Room Three',
                'address'=>'Via Repubblica 86, 20026, Novate Milanese, Milano',
                'price'=>'49.99',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'5',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'70',
                'src'=>'uploads/apt1.jpg',
                'address_lat'=>'45.465454',
                'address_lng'=>'9.186516',
                'slug'=>'corte-milanese-room-three'
            ],
            [
                'user_id'=>'1',
                'title' =>'Appartamento Da Vinci Milano',
                'address'=>'Via Senigallia 6, 20161, Milano',
                'price'=>'63.00',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'6',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'80',
                'src'=>'uploads/apt2.jpg',
                'address_lat'=>'45.5331778',
                'address_lng'=>'9.1710849',
                'slug'=>'appartamento-da-vinci-milano'
            ],
            [
                'user_id'=>'1',
                'title' =>'Villa Cheta',
                'address'=>'Via Privata Imola,3, 20158, Milano',
                'price'=>'40',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'50',
                'src'=>'uploads/apt3.jpg',
                'address_lat'=>'45.46427',
                'address_lng'=>'9.18951',
                'slug'=>'villa-cheta'
            ],
            [
                'user_id'=>'2',
                'title' =>'Appartamento Milano Sesto Marelli',
                'address'=>'Via Ercole Marelli 303, 20099, Sesto San Giovanni',
                'price'=>'80',
                'number_of_rooms'=>'5',
                'number_of_beds'=>'7',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'100',
                'src'=>'uploads/apt4.jpg',
                'address_lat'=>'45.5269787',
                'address_lng'=>'9.2294943',
                'slug'=>'appartamento-milano-sesto-marelli'
            ],
            [
                'user_id'=>'2',
                'title' =>'Repubblica Apartment Roma',
                'address'=>'Via Cernaia 20, 00185, Roma',
                'price'=>'12',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'3',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'45',
                'src'=>'uploads/apt10.jpg',
                'address_lat'=>'41.9062834',
                'address_lng'=>'12.4998886',
                'slug'=>'repubblica-apartment-roma'
            ],
            [
                'user_id'=>'2',
                'title' =>'Casa della Divina',
                'address'=>'Via della Consulta 1b, 00184, Roma',
                'price'=>'65',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'65',
                'src'=>'uploads/apt6.jpg',
                'address_lat'=>'41.8981217',
                'address_lng'=>'12.4892876',
                'slug'=>'casa-della-divina'
            ],
            [
                'user_id'=>'3',
                'title' =>'Glamour Apartments',
                'address'=>'Passaggio Duomo 2, 20123, Milano',
                'price'=>'180',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'4',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'105',
                'src'=>'uploads/apt7.jpg',
                'address_lat'=>'45.4642374',
                'address_lng'=>'9.1882275',
                'slug'=>'glamour-apartments'
            ],
            [
                'user_id'=>'3',
                'title' =>'Appartamento Giardino',
                'address'=>'Via dei Missaglia 14, 20142, Milano',
                'price'=>'65',
                'number_of_rooms'=>'12',
                'number_of_beds'=>'10',
                'number_of_bathrooms'=>'5',
                'square_meters'=>'150',
                'src'=>'uploads/apt8.jpg',
                'address_lat'=>'45.4287253',
                'address_lng'=>'9.1777495',
                'slug'=>'appartamento-giardino'
            ],
            [
                'user_id'=>'3',
                'title' =>'Residence Milano Fiore',
                'address'=>'Via Roggia Bartolomea 5, 20090, Assago, Milano',
                'price'=>'32',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'73',
                'src'=>'uploads/pt9.jpg',
                'address_lat'=>'45.4079399',
                'address_lng'=>'9.1531421',
                'slug'=>'residence-milano-fiore'
            ],
            [
                'user_id'=>'3',
                'title' =>'Panchina nel Parco',
                'address'=>'Piazza Sempione, 20154, Milano',
                'price'=>'1000',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'1',
                'src'=>'uploads/apt5.jpg',
                'address_lat'=>'45.4763189',
                'address_lng'=>'9.1724903',
                'slug'=>'panchina-nel-parco'
            ]
        ];

        foreach ($datas as $data) {
            $newApartment = new Apartment();
            $newApartment->user_id = $data['user_id'];
            $newApartment->title = $data['title'];
            $newApartment->address = $data['address'];
            $newApartment->price = $data['price'];
            $newApartment->number_of_rooms = $data['number_of_rooms'];
            $newApartment->number_of_beds = $data['number_of_beds'];
            $newApartment->number_of_bathrooms = $data['number_of_bathrooms'];
            $newApartment->square_meters = $data['square_meters'];
            $newApartment->src = $data['src'];
            $newApartment->address_lat = $data['address_lat'];
            $newApartment->address_lng = $data['address_lng'];
            $newApartment->slug = $data['slug'];
            $newApartment->save();
        }



        // for ($i = 0; $i < 5; $i++){
        //     $newApartment = new Apartment();
        //     $newApartment->user_id = $faker->numberBetween(7,8);
        //     $newApartment->title = $faker->sentence(4);
        //     $newApartment->address = $faker->address;
        //     $newApartment->price = $faker->randomFloat(2, 10, 1000);
        //     $newApartment->number_of_rooms = $faker->numberBetween(1,10);
        //     $newApartment->number_of_beds = $faker->numberBetween(1,20);
        //     $newApartment->number_of_bathrooms = $faker->numberBetween(1,10);
        //     $newApartment->square_meters = $faker->numberBetween(1,10000);
        //     $newApartment->src = $faker->imageUrl($width = 640, $height = 480, 'cats');
        //     $newApartment->address_lat = $faker->latitude($min = -90, $max = 90);
        //     $newApartment->address_lng = $faker->longitude($min = -180, $max = 180) ;
        //     $newApartment->slug = $faker->slug;
        //     $newApartment->save();
        // }
    }
}
