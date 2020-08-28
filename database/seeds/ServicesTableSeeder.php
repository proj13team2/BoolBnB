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
            ['type'=>'posto macchina'],
            ['type'=>'piscina'],
            ['type'=>'portineria'],
            ['type'=>'sauna'],
            ['type'=>'vista mare'],
        ];
        
        foreach ($services as $service) {
            $newService = new Service();
            $newService->type = $service['type'];
            $newService->save();
        }
    }
}
