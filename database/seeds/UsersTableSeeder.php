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
    public function run()
    {

        // $datas = [
        //     [  
        //         'name'=>'Giorgio',
        //         'lastname' =>'Vanni',
        //         'date_of_birth'=>'1965-07-12',
        //         'email'=>'giorginovanni@gmail.com',
        //         'password'=>'12345678'
        //     ],
        //     [  
        //         'name'=>'Chiara',
        //         'lastname' =>'Mente',
        //         'date_of_birth'=>'1993-12-25',
        //         'email'=>'chiaramente@gmail.com',
        //         'password'=>'12345678'
        //     ],
        //     [  
        //         'name'=>'Mario',
        //         'lastname' =>'Super',
        //         'date_of_birth'=>'1981-01-01',
        //         'email'=>'supermario@gmail.com',
        //         'password'=>'12345678'
        //     ]
        // ];

        // foreach ($datas as $data) {
        //     $newUser = new User();
        //     $newUser->name = $data['name'];
        //     $newUser->lastname = $data['lastname'];
        //     $newUser->date_of_birth = $data['date_of_birth'];
        //     $newUser->email = $data['email'];
        //     $newUser->password = $data['password'];
        //     $newUser->save();
        // }

        // for ($i = 0; $i < 2; $i++){
        //     $newUser = new User();
        //     $newUser->name = $faker->firstName;
        //     $newUser->lastname = $faker->lastName;
        //     $newUser->date_of_birth = $faker->dateTimeBetween($startDate = '-150 years', $endDate = '-18 years');
        //     $newUser->email = $faker->freeEmail;
        //     $newUser->password = $faker->password;
        //     $newUser->save();
        // }
    }
}
