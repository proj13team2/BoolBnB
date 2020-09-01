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
            ['type'=>'Wifi'],
            ['type'=>'Posto macchina'],
            ['type'=>'Piscina'],
            ['type'=>'Portineria'],
            ['type'=>'Sauna'],
            ['type'=>'Vista mare'],
        ];
        
        foreach ($services as $service) {
            $newService = new Service();
            $newService->type = $service['type'];
            $newService->save();
        }
    }
}
