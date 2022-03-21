<?php

namespace Database\Seeders;

use App\Models\employe;
use App\Models\overtime;
use App\Models\profile;
use Illuminate\Support\Str;
use App\Models\setting;
use App\Models\User;
use App\Traits\EndPointOvertime;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountGeneratorSeeder extends Seeder
{
    use EndPointOvertime;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_user = [
            [
                'name' => 'admin bayu',
                'email' => 'bayu@admin.com',
                'password' =>'admin1234',
                'level' => 'admin',
            ]
        ];

        foreach ($seed_user as $key => $value) {
            $new_user = User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => Hash::make($value['password']),
            ]);
            $new_profile = new profile();
            $new_profile->level = $value['level'];
            $new_user->profile()->save($new_profile);

            $this->createEmploye($new_user);

            // create example employe
            $new_user->save();

        }

        setting::create([
            'key' => 'overtime_method',
            'value' => 1,
            'expression' => '(salary / 173) * overtime_duration_total',
        ]);
    }


    public function createEmploye($user)
    {
        for ($i=0; $i < 3; $i++) {
            $new_employe = new employe();
            $new_employe->name = Str::random(10);
            $new_employe->status_id = 3;
            $new_employe->salary = rand(2000000, 10000000);
            $user->employe()->save($new_employe);
        }
    }
}
