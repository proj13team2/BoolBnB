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
        for ($i = 0; $i < 5; $i++){
            $newApartment = new Apartment();
            $newApartment->user_id = $faker->numberBetween(7,8);
            $newApartment->title = $faker->sentence(4);
            $newApartment->address = $faker->address;
            $newApartment->price = $faker->randomFloat(2, 10, 1000);
            $newApartment->number_of_rooms = $faker->numberBetween(1,10);
            $newApartment->number_of_bathrooms = $faker->numberBetween(1,10);
            $newApartment->square_meters = $faker->numberBetween(1,10000);
            $newApartment->src = $faker->imageUrl($width = 640, $height = 480, 'cats');
            $newApartment->address_lat = $faker->latitude($min = -90, $max = 90);
            $newApartment->address_lng = $faker->longitude($min = -180, $max = 180) ;
            $newApartment->slug = $faker->slug;
            $newApartment->save();
        }
    }
}
