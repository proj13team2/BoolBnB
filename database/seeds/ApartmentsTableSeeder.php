<?php

use Illuminate\Database\Seeder;
use App\Apartment;


class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
                'src'=>'uploads/apt5.jpg',
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
                'src'=>'uploads/apt9.jpg',
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
                'src'=>'uploads/apt10.jpg',
                'slug'=>'panchina-nel-parco'
            ],
            [
                'id' => 11,
                'user_id'=>'1',
                'title' =>'La Mansardina Torino Centro',
                'price'=>'35',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'55',
                'src'=>'uploads/apt11.jpg',
                'slug'=>'la-mansardina-torino-centro'
            ],
            [
                'id' => 12,
                'user_id'=>'2',
                'title' =>'Attico Torino Parco Tesoreria',
                'price'=>'80',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'4',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'85',
                'src'=>'uploads/apt12.jpg',
                'slug'=>'attico-torino-parco-tesoreria'
            ],
            [
                'id' => 13,
                'user_id'=>'2',
                'title' =>'Appartamento Cascine di Corte',
                'price'=>'43',
                'number_of_rooms'=>'5',
                'number_of_beds'=>'7',
                'number_of_bathrooms'=>'3',
                'square_meters'=>'56',
                'src'=>'uploads/apt13.jpg',
                'slug'=>'appartamento-cascine-di-corte'
            ],
            [
                'id' => 14,
                'user_id'=>'3',
                'title' =>'Residence Fioroni con vista Lago',
                'price'=>'90',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'4',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'78',
                'src'=>'uploads/apt14.jpg',
                'slug'=>'residence-fioroni-vista-lago'
            ],
            [
                'id' => 15,
                'user_id'=>'3',
                'title' =>'Appartamento San Vigilio',
                'price'=>'68',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'6',
                'number_of_bathrooms'=>'3',
                'square_meters'=>'123',
                'src'=>'uploads/apt15.jpg',
                'slug'=>'appartamento-san-vigilio'
            ],
            [
                'id' => 16,
                'user_id'=>'1',
                'title' =>'Florence Apartment',
                'price'=>'56',
                'number_of_rooms'=>'5',
                'number_of_beds'=>'7',
                'number_of_bathrooms'=>'4',
                'square_meters'=>'200',
                'src'=>'uploads/apt16.jpg',
                'slug'=>'florence-apartment'
            ],
            [
                'id' => 17,
                'user_id'=>'1',
                'title' =>'La Casa sui Tetti',
                'price'=>'77',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'3',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'45',
                'src'=>'uploads/apt17.jpg',
                'slug'=>'casa-sui-tetti'
            ],
            [
                'id' => 18,
                'user_id'=>'2',
                'title' =>'Appartamento Bellosguardo',
                'price'=>'123',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'6',
                'number_of_bathrooms'=>'3',
                'square_meters'=>'134',
                'src'=>'uploads/apt18.jpg',
                'slug'=>'appartamento-bellosguardo'
            ],
            [
                'id' => 19,
                'user_id'=>'2',
                'title' =>'Luxury Apartment Prato',
                'price'=>'150',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'4',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'97',
                'src'=>'uploads/apt19.jpg',
                'slug'=>'luxury-apartment-prato'
            ],
            [
                'id' => 20,
                'user_id'=>'2',
                'title' =>'Casa Hotel Aria di Mare',
                'price'=>'47',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'3',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'55',
                'src'=>'uploads/apt20.jpg',
                'slug'=>'casa-hotel-aria-di-mare'
            ],
            [
                'id' => 21,
                'user_id'=>'3',
                'title' =>'Aran Blu Casa Vacanze',
                'price'=>'79',
                'number_of_rooms'=>'8',
                'number_of_beds'=>'10',
                'number_of_bathrooms'=>'5',
                'square_meters'=>'240',
                'src'=>'uploads/apt21.jpg',
                'slug'=>'aran-blu-casa-vacanze'
            ],
            [
                'id' => 22,
                'user_id'=>'3',
                'title' =>'Villa Clodia',
                'price'=>'111',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'7',
                'number_of_bathrooms'=>'4',
                'square_meters'=>'179',
                'src'=>'uploads/apt22.jpg',
                'slug'=>'villa-clodia'
            ],
            [
                'id' => 23,
                'user_id'=>'1',
                'title' =>'Appartamento Le Sequoie',
                'price'=>'56',
                'number_of_rooms'=>'1',
                'number_of_beds'=>'1',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'33',
                'src'=>'uploads/apt23.jpg',
                'slug'=>'appartamento-le-sequoie'
            ],
            [
                'id' => 24,
                'user_id'=>'1',
                'title' =>'Casa Vacanze Centro Storico Palermo',
                'price'=>'44',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'3',
                'square_meters'=>'66',
                'src'=>'uploads/apt24.jpg',
                'slug'=>'casa-vacanze-centro-storico-palermo'
            ],
            [
                'id' => 25,
                'user_id'=>'1',
                'title' =>'Villa Anni 20',
                'price'=>'90',
                'number_of_rooms'=>'5',
                'number_of_beds'=>'8',
                'number_of_bathrooms'=>'5',
                'square_meters'=>'133',
                'src'=>'uploads/apt25.jpg',
                'slug'=>'villa-anni-20'
            ],
            [
                'id' => 26,
                'user_id'=>'2',
                'title' =>'La Casa di Benny',
                'price'=>'122',
                'number_of_rooms'=>'6',
                'number_of_beds'=>'8',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'145',
                'src'=>'uploads/apt26.jpg',
                'slug'=>'la-casa-di-benny'
            ],
            [
                'id' => 27,
                'user_id'=>'2',
                'title' =>'Home Club Mare Flat',
                'price'=>'88',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'65',
                'src'=>'uploads/apt27.jpg',
                'slug'=>'home-club-mare-flat'
            ],
            [
                'id' => 28,
                'user_id'=>'3',
                'title' =>'Rifugio Romantico',
                'price'=>'119',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'7',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'137',
                'src'=>'uploads/apt28.jpg',
                'slug'=>'rifugio-romantico'
            ],
            [
                'id' => 29,
                'user_id'=>'3',
                'title' =>'Casa Nonna Carmela',
                'price'=>'140',
                'number_of_rooms'=>'5',
                'number_of_beds'=>'8',
                'number_of_bathrooms'=>'3',
                'square_meters'=>'180',
                'src'=>'uploads/apt29.jpg',
                'slug'=>'casa-nonna-carmela'
            ],
            [
                'id' => 30,
                'user_id'=>'1',
                'title' =>'The Milky House Milan',
                'price'=>'99',
                'number_of_rooms'=>'2',
                'number_of_beds'=>'2',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'76',
                'src'=>'uploads/apt30.jpg',
                'slug'=>'the-milky-house-milan'
            ],
            [
                'id' => 31,
                'user_id'=>'2',
                'title' =>'Home Sweet Home',
                'price'=>'88',
                'number_of_rooms'=>'4',
                'number_of_beds'=>'5',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'113',
                'src'=>'uploads/apt31.jpg',
                'slug'=>'home-sweet-home'
            ],
            [
                'id' => 32,
                'user_id'=>'2',
                'title' =>'B&B Mulino di Prada',
                'price'=>'110',
                'number_of_rooms'=>'7',
                'number_of_beds'=>'10',
                'number_of_bathrooms'=>'4',
                'square_meters'=>'333',
                'src'=>'uploads/apt32.jpg',
                'slug'=>'mulino-di-prada'
            ],
            [
                'id' => 33,
                'user_id'=>'1',
                'title' =>'South Italy House Apartment',
                'price'=>'77',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'5',
                'number_of_bathrooms'=>'2',
                'square_meters'=>'80',
                'src'=>'uploads/apt33.jpg',
                'slug'=>'south-italy-house-apartment'
            ],
            [
                'id' => 34,
                'user_id'=>'1',
                'title' =>'Appartamento Avogadro',
                'price'=>'55',
                'number_of_rooms'=>'1',
                'number_of_beds'=>'1',
                'number_of_bathrooms'=>'1',
                'square_meters'=>'45',
                'src'=>'uploads/apt34.jpg',
                'slug'=>'appartamento-avogadro'
            ],
            [
                'id' => 35,
                'user_id'=>'3',
                'title' =>'Villa Est da Irene',
                'price'=>'69',
                'number_of_rooms'=>'3',
                'number_of_beds'=>'4',
                'number_of_bathrooms'=>'3',
                'square_meters'=>'78',
                'src'=>'uploads/apt35.jpg',
                'slug'=>'villa-est-da-irene'
            ],
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
