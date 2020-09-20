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
            ],
            [
                'id'=>'11',
                'apartment_id'=>'11',
                'street' =>'Corso S.Martino',
                'building_number'=>'5',
                'city'=>'Torino',
                'zip_code'=>'10122',
                'region'=>'Torino',
                'country'=>'Italia',
                'lat'=>'45.0751109',
                'lng'=>'7.6692819',
            ],
            [
                'id'=>'12',
                'apartment_id'=>'12',
                'street' =>'Corso Francia',
                'building_number'=>'186',
                'city'=>'Torino',
                'zip_code'=>'10145',
                'region'=>'Torino',
                'country'=>'Italia',
                'lat'=>'45.0769461',
                'lng'=>'7.6385276',
            ],
            [
                'id'=>'13',
                'apartment_id'=>'13',
                'street' =>'Via Amedeo di Castellamonte',
                'building_number'=>'2',
                'city'=>'Venaria Reale',
                'zip_code'=>'10078',
                'region'=>'Torino',
                'country'=>'Italia',
                'lat'=>'45.1377235',
                'lng'=>'7.6269931',
            ],
            [
                'id'=>'14',
                'apartment_id'=>'14',
                'street' =>'Via Domenico Vitali',
                'building_number'=>'2',
                'city'=>'Bellagio',
                'zip_code'=>'22021',
                'region'=>'Como',
                'country'=>'Italia',
                'lat'=>'45.98772',
                'lng'=>'9.26182',
            ],
            [
                'id'=>'15',
                'apartment_id'=>'15',
                'street' =>'Via Al Castello',
                'building_number'=>'7',
                'city'=>'Bergamo',
                'zip_code'=>'24129',
                'region'=>'Bergamo',
                'country'=>'Italia',
                'lat'=>'45.7090882',
                'lng'=>'9.6513707',
            ],
            [
                'id'=>'16',
                'apartment_id'=>'16',
                'street' =>'Via degli Alfani',
                'building_number'=>'17',
                'city'=>'Firenze',
                'zip_code'=>'50121',
                'region'=>'Firenze',
                'country'=>'Italia',
                'lat'=>'43.7742111',
                'lng'=>'11.2628032',
            ],
            [
                'id'=>'17',
                'apartment_id'=>'17',
                'street' =>'Via Fiesolana',
                'building_number'=>'44',
                'city'=>'Firenze',
                'zip_code'=>'50121',
                'region'=>'Firenze',
                'country'=>'Italia',
                'lat'=>'43.7732239',
                'lng'=>'11.2637044',
            ],
            [
                'id'=>'18',
                'apartment_id'=>'18',
                'street' =>'Via Aleandro Aleardi',
                'building_number'=>'26a',
                'city'=>'Firenze',
                'zip_code'=>'50124',
                'region'=>'Firenze',
                'country'=>'Italia',
                'lat'=>'43.7688532',
                'lng'=>'11.2366377',
            ],
            [
                'id'=>'19',
                'apartment_id'=>'19',
                'street' =>'Via Paronese',
                'building_number'=>'116/10',
                'city'=>'Prato',
                'zip_code'=>'59100',
                'region'=>'Prato',
                'country'=>'Italia',
                'lat'=>'43.8570498',
                'lng'=>'11.0669546',
            ],
            [
                'id'=>'20',
                'apartment_id'=>'20',
                'street' =>'Via Monte Alla Rena',
                'building_number'=>'23',
                'city'=>'Rosignano Solvay-Castiglioncello',
                'zip_code'=>'57016',
                'region'=>'Livorno',
                'country'=>'Italia',
                'lat'=>'43.3960392',
                'lng'=>'10.4340511',
            ],
            [
                'id'=>'21',
                'apartment_id'=>'21',
                'street' =>'Lungo Mare Duca degli Abruzzi',
                'building_number'=>'72',
                'city'=>'Lido di Ostia',
                'zip_code'=>'00121',
                'region'=>'Roma',
                'country'=>'Italia',
                'lat'=>'41.7372881',
                'lng'=>'12.2532751',
            ],
            [
                'id'=>'22',
                'apartment_id'=>'22',
                'street' =>'Via del Mattiolo',
                'building_number'=>'3',
                'city'=>'Manziana',
                'zip_code'=>'00066',
                'region'=>'Roma',
                'country'=>'Italia',
                'lat'=>'42.1277749',
                'lng'=>'12.1337099',
            ],
            [
                'id'=>'23',
                'apartment_id'=>'23',
                'street' =>'Via Valeria Tiburtina',
                'building_number'=>'Km 68,900',
                'city'=>'Carsoli',
                'zip_code'=>'67061',
                'region'=>'Aquila',
                'country'=>'Italia',
                'lat'=>'42.0988',
                'lng'=>'13.0886',
            ],
            [
                'id'=>'24',
                'apartment_id'=>'24',
                'street' =>'Via Alberghiera',
                'building_number'=>'126',
                'city'=>'Palermo',
                'zip_code'=>'90134',
                'region'=>'Palermo',
                'country'=>'Italia',
                'lat'=>'38.1094457',
                'lng'=>'13.3570769',
            ],
            [
                'id'=>'25',
                'apartment_id'=>'25',
                'street' =>'Via Mattarella Bernardo',
                'building_number'=>'130',
                'city'=>'Bagheria',
                'zip_code'=>'90011',
                'region'=>'Palermo',
                'country'=>'Italia',
                'lat'=>'38.079351',
                'lng'=>'13.509349',
            ],
            [
                'id'=>'26',
                'apartment_id'=>'26',
                'street' =>'Contrada Torrazza Porto Marina Lotarello',
                'building_number'=>'ss113',
                'city'=>'Castel di Tusa',
                'zip_code'=>'98079',
                'region'=>'Messina',
                'country'=>'Italia',
                'lat'=>'37.9839',
                'lng'=>'14.2361',
            ],
            [
                'id'=>'27',
                'apartment_id'=>'27',
                'street' =>'Contrada Chiavarello',
                'building_number'=>'22',
                'city'=>'Licata',
                'zip_code'=>'92027',
                'region'=>'Agrigento',
                'country'=>'Italia',
                'lat'=>'37.1084',
                'lng'=>'13.9449',
            ],
            [
                'id'=>'28',
                'apartment_id'=>'28',
                'street' =>'Via P. Umberto',
                'building_number'=>'116',
                'city'=>'Pachino',
                'zip_code'=>'96018',
                'region'=>'Siracusa',
                'country'=>'Italia',
                'lat'=>'36.717',
                'lng'=>'15.0906',
            ],
            [
                'id'=>'29',
                'apartment_id'=>'29',
                'street' =>'Via del Gorgo Salato',
                'building_number'=>'12',
                'city'=>'Ispica',
                'zip_code'=>'97014',
                'region'=>'Ragusa',
                'country'=>'Italia',
                'lat'=>'36.7076119',
                'lng'=>'14.9725539',
            ],
            [
                'id'=>'30',
                'apartment_id'=>'30',
                'street' =>'Via Bernardo Celentano',
                'building_number'=>'18',
                'city'=>'Milano',
                'zip_code'=>'20132',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.5011021',
                'lng'=>'9.2409305',
            ],
            [
                'id'=>'31',
                'apartment_id'=>'31',
                'street' =>'Via Palmiro Togliatti',
                'building_number'=>'140',
                'city'=>'Rozzano',
                'zip_code'=>'20089',
                'region'=>'Milano',
                'country'=>'Italia',
                'lat'=>'45.3782353',
                'lng'=>'9.14822',
            ],
            [
                'id'=>'32',
                'apartment_id'=>'32',
                'street' =>'Cascina Bastia',
                'building_number'=>'5',
                'city'=>'Corte Palasio',
                'zip_code'=>'26834',
                'region'=>'Lodi',
                'country'=>'Italia',
                'lat'=>'45.3303',
                'lng'=>'9.5448',
            ],
            [
                'id'=>'33',
                'apartment_id'=>'33',
                'street' =>'Via Fratelli di Dio',
                'building_number'=>'29',
                'city'=>'Busto Arsizio',
                'zip_code'=>'21052',
                'region'=>'Varese',
                'country'=>'Italia',
                'lat'=>'45.5874121',
                'lng'=>'8.846457',
            ],
            [
                'id'=>'34',
                'apartment_id'=>'34',
                'street' =>'Via San Carlo',
                'building_number'=>'40',
                'city'=>'San Pellegrino Terme',
                'zip_code'=>'24016',
                'region'=>'Bergamo',
                'country'=>'Italia',
                'lat'=>'45.8344',
                'lng'=>'9.6675',
            ],
            [
                'id'=>'35',
                'apartment_id'=>'35',
                'street' =>'Vicolo Alessandro Manzoni',
                'building_number'=>'9/a',
                'city'=>'Sovico',
                'zip_code'=>'20845',
                'region'=>'Monza Brianza',
                'country'=>'Italia',
                'lat'=>'45.6485558',
                'lng'=>'9.2648372',
            ],
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
