<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 2; $i++){
            $newUser = new User();
            $newUser->name = $faker->firstName;
            $newUser->lastname = $faker->lastName;
            $newUser->date_of_birth = $faker->dateTimeBetween($startDate = '-150 years', $endDate = '-18 years');
            $newUser->email = $faker->freeEmail;
            $newUser->password = $faker->password;
            $newUser->save();
        }
    }
}
