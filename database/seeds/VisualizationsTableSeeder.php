
<?php

use Illuminate\Database\Seeder;
use App\Visualization;
use Faker\Generator as Faker;

class VisualizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i = 0; $i < 100; $i++){
             $newVisualization = new Visualization();
             $newVisualization->visual_ip = $faker->localIpv4;
             $newVisualization->apartment_id = $faker->numberBetween(1,35);
             $newVisualization->created_at = $faker->dateTimeBetween($startDate = '-8 months', $endDate = 'now', $timezone = null);
             $newVisualization->save();
         }
     }
}
