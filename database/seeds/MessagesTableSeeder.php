<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++){
            $newMessage = new Message();
            $newMessage->email = $faker->freeEmail;
            $newMessage->content = $faker->text(150);
            $newMessage->apartment_id = $faker->numberBetween(1,5);
            $newMessage->save();
        }
    }
}
