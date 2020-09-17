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

        $datas = [
            [
                'content' => 'Buongiorno, sarei interessato a passare il weekend da voi. Sapreste dirmi se nelle vicinanze ci sono delle attività ricreative per bambini? Grazie.',
            ],
            [
                'content' => 'Buongiorno, vorrei prenotare la casa per questo fine settimana.',
            ],
            [
                'content' => 'Buonasera, accettate pagamento in contanti o solo carta di credito?',
            ],
            [
                'content' => 'Buongiorno, a quanto dista il parcheggio più vicino?',
            ],
            [
                'content' => 'Buonasera, sapreste congliarmi un itinerario nelle vicinzane per i giorni in cui soggiornerò da voi? Grazie.'
            ],
        ];

        for ($i = 0; $i < 10 ; $i++){
            foreach ($datas as $data) {
                $newMessage = new Message();
                $newMessage->email = $faker->freeEmail;
                $newMessage->content = $data['content'];
                $newMessage->apartment_id = $faker->numberBetween(1,35);
                $newMessage->created_at = $faker->dateTimeBetween($startDate = '-8 months', $endDate = 'now', $timezone = null);
                $newMessage->save();
            }

        }
    }
}
