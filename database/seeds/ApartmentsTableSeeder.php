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
                'id' => 1,
                'user_id'=>'1',
                'title' =>'Corte Milanese Room Three',
                'price'=>'49.99',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'5',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'70',
                'src'=>'uploads/apt1.jpg',
                'slug'=>'corte-milanese-room-three'
            ],
            [
                'id' => 2,
                'user_id'=>'1',
                'title' =>'Appartamento Da Vinci Milano',
                'price'=>'63.00',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'6',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'80',
                'src'=>'uploads/apt2.jpg',
                'slug'=>'appartamento-da-vinci-milano'
            ],
            [
                'id' => 3,
                'user_id'=>'1',
                'title' =>'Villa Cheta',
                'price'=>'40',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'50',
                'src'=>'uploads/apt3.jpg',
                'slug'=>'villa-cheta'
            ],
            [
                'id' => 4,
                'user_id'=>'2',
                'title' =>'Appartamento Milano Sesto Marelli',
                'price'=>'80',
                'number_of_rooms'=>'5',
                'number_of_beds'=>'7',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'100',
                'src'=>'uploads/apt4.jpg',
                'slug'=>'appartamento-milano-sesto-marelli'
            ],
            [
                'id' => 5,
                'user_id'=>'2',
                'title' =>'Repubblica Apartment Roma',
                'price'=>'12',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'3',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'45',
                'src'=>'uploads/apt10.jpg',
                'slug'=>'repubblica-apartment-roma'
            ],
            [
                'id' => 6,
                'user_id'=>'2',
                'title' =>'Casa della Divina',
                'price'=>'65',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'65',
                'src'=>'uploads/apt6.jpg',
                'slug'=>'casa-della-divina'
            ],
            [
                'id' => 7,
                'user_id'=>'3',
                'title' =>'Glamour Apartments',
                'price'=>'180',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'4',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'105',
                'src'=>'uploads/apt7.jpg',
                'slug'=>'glamour-apartments'
            ],
            [
                'id' => 8,
                'user_id'=>'3',
                'title' =>'Appartamento Giardino',
                'price'=>'65',
                'number_of_rooms'=>'12',
                'number_of_beds'=>'10',
                'number_of_bathrooms'=>'5',
                'square_meters'=>'150',
                'src'=>'uploads/apt8.jpg',
                'slug'=>'appartamento-giardino'
            ],
            [
                'id' => 9,
                'user_id'=>'3',
                'title' =>'Residence Milano Fiore',
                'price'=>'32',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'73',
                'src'=>'uploads/pt9.jpg',
                'slug'=>'residence-milano-fiore'
            ],
            [
                'id' => 10,
                'user_id'=>'3',
                'title' =>'Panchina nel Parco',
                'price'=>'1000',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'1',
                'src'=>'uploads/apt5.jpg',
                'slug'=>'panchina-nel-parco'
            ]
        ];

        foreach ($datas as $data) {
            $newApartment = new Apartment();
            $newApartment->user_id = $data['user_id'];
            $newApartment->title = $data['title'];
            $newApartment->price = $data['price'];
            $newApartment->number_of_rooms = $data['number_of_rooms'];
            $newApartment->number_of_beds = $data['number_of_beds'];
            $newApartment->number_of_bathrooms = $data['number_of_bathrooms'];
            $newApartment->square_meters = $data['square_meters'];
            $newApartment->src = $data['src'];
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
