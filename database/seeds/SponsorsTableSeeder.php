<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            ['sponsorship_level'=>'standard',
             'price'=> 2.99,
             'duration'=> 1,
            ],
            ['sponsorship_level'=>'medium',
             'price'=>5.99,
             'duration'=> 3,
            ],
            ['sponsorship_level'=>'premium',
             'price'=>9.99,
             'duration'=> 6,
            ]
        ];

        foreach ($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->sponsorship_level = $sponsor['sponsorship_level'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->duration = $sponsor['duration'];
            $newSponsor->save();
        }
    }
}
