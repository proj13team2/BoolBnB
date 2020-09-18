<?php
use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
              'type'=>'Wifi',
              'description'=>'wifi'
            ],
            [
              'type'=>'Posto macchina',
              'description'=>'car'
            ],
            [
              'type'=>'Piscina',
              'description'=>'swimming-pool'
            ],
            [
              'type'=>'Portineria',
              'description'=>'clipboard-list'
            ],
            [
              'type'=>'Sauna',
              'description'=>'hot-tub'
            ],
            [
              'type'=>'Mare',
              'description'=>'fish'
            ]
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->type = $service['type'];
            $newService->description = $service['description'];
            $newService->save();
        }
    }
}
