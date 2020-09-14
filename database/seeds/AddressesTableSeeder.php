<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
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
                'id'=>'1',
                'apartment_id'=>'1',
                'street' =>'Via Repubblica',
                'building_number'=>'86',
                'city'=>'Novate Milanese',
                'zip_code'=>'20026',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.5305',
                'lng'=>'9.13954',
            ],
            [
                'id'=>'2',
                'apartment_id'=>'2',
                'street' =>'Via Senigallia',
                'building_number'=>'6',
                'city'=>'Milano',
                'zip_code'=>'20161',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.5331778',
                'lng'=>'9.1710849',

            ],
            [
                'id'=>'3',
                'apartment_id'=>'3',
                'street' =>'Via Privata Imola',
                'building_number'=>'3',
                'city'=>'Milano',
                'zip_code'=>'20158',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.46427',
                'lng'=>'9.18951',
            ],
            [
                'id'=>'4',
                'apartment_id'=>'4',
                'street' =>'Via Ercole Marelli',
                'building_number'=>'303',
                'city'=>'Sesto San Giovanni',
                'zip_code'=>'20099',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.5269787',
                'lng'=>'9.2294943',
            ],
            [
                'id'=>'5',
                'apartment_id'=>'5',
                'street' =>'Via Cernaia',
                'building_number'=>'20',
                'city'=>'Roma',
                'zip_code'=>'00185',
                'region'=>'Roma',
                'country'=>'Italia',
                'lat'=>'41.9062834',
                'lng'=>'12.4998886',
            ],
            [
                'id'=>'6',
                'apartment_id'=>'6',
                'street' =>'Via della Consulta',
                'building_number'=>'1b',
                'city'=>'Roma',
                'zip_code'=>'00184',
                'region'=>'Roma',
                'country'=>'Italia',
                'lat'=>'41.8981217',
                'lng'=>'12.4892876',
            ],
            [
                'id'=>'7',
                'apartment_id'=>'7',
                'street' =>'Passaggio Duomo',
                'building_number'=>'2',
                'city'=>'Milano',
                'zip_code'=>'20123',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.4642374',
                'lng'=>'9.1882275',
            ],
            [
                'id'=>'8',
                'apartment_id'=>'8',
                'street' =>'Via dei Missaglia',
                'building_number'=>'14',
                'city'=>'Milano',
                'zip_code'=>'20142',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.4287253',
                'lng'=>'9.1777495',
            ],
            [
                'id'=>'9',
                'apartment_id'=>'9',
                'street' =>'Via Roggia Bartolomea',
                'building_number'=>'5',
                'city'=>'Milano',
                'zip_code'=>'20090',
                'region'=>'Assago',
                'country'=>'Italia',
                'lat'=>'45.4079399',
                'lng'=>'9.1531421',
            ],
            [
                'id'=>'10',
                'apartment_id'=>'10',
                'street' =>'Piazza Sempione',
                'building_number'=>'1',
                'city'=>'Milano',
                'zip_code'=>'20154',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.4763189',
                'lng'=>'9.1724903',
            ]
        ];

        foreach ($datas as $data) {
            $newAddress = new Address();
            $newAddress->apartment_id = $data['apartment_id'];
            $newAddress->street = $data['street'];
            $newAddress->building_number = $data['building_number'];
            $newAddress->city = $data['city'];
            $newAddress->zip_code = $data['zip_code'];
            $newAddress->region = $data['region'];
            $newAddress->country = $data['country'];
            $newAddress->lat = $data['lat'];
            $newAddress->lng = $data['lng'];
            $newAddress->save();
        }
    }
}
