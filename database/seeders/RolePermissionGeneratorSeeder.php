<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create permissions
        $seed_permission = [
            [
                'name' => 'management users'
            ],[
                'name' => 'management access'
            ]
        ];

        foreach ($seed_permission as $key => $value) {
            Permission::create($value);
        }


        $seed_role = [
            [
                'name' => 'super-admin'
            ],[
                'name' => 'admin'
            ],[
                'name' => 'seller'
            ],
        ];

        foreach ($seed_role as $key => $value) {
            Role::create($value);
        }
    }
}
