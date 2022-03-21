<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
