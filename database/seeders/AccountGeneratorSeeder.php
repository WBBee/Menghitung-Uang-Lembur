<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_user = [
            [
                'name' => 'super admin bayu',
                'email' => 'bayu@super-admin.com',
                'password' =>'superadmin',
                'role' => 'super-admin',
                'permission' => ['management users', 'management access'],
            ],[
                'name' => 'admin bayu',
                'email' => 'bayu@admin.com',
                'password' =>'admin1234',
                'role' => 'admin',
                'permission' => null,
            ],[
                'name' => 'seller bayu',
                'email' => 'bayu@seller.com',
                'password' =>'seller1234',
                'role' => 'seller',
                'permission' => null,
            ],
        ];

        foreach ($seed_user as $key => $value) {
            $new_user = User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => Hash::make($value['password']),
            ]);

            $new_user->assignRole($value['role']);
            $new_user->givePermissionTo($value['permission']);
        }
    }
}
