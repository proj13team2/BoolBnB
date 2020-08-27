<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles= [
            [
                'name' => 'UPR',
                'description' => 'Registered user without registered apartments'
            ],
            [
                'name' => 'UPRA',
                'description' => 'Registered user with at least 1 apartment'
            ],
            [
                'name' => 'Admin',
                'description' => 'User whit superpowers'
            ],
        ];

        foreach ($roles as $role) {
            $newRole = new Role();
            $newRole->name = $role['name'];
            $newRole->description = $role['description'];
            $newRole->save();
        }
    }
}
