<?php

namespace Database\Seeders;

use App\Models\reference;
use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenceGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_reference = [
            [
                'code' => 'overtime_method',
                'name' => 'Salary / 173',
                'expression' => '(salary / 173) * overtime_duration_total',
            ],[
                'code' => 'overtime_method',
                'name' => 'Fixed',
                'expression' => '10000 * overtime_duration_total',
            ],[
                'code' => 'employee_status',
                'name' => 'Tetap',
                'expression' => null,
            ],[
                'code' => 'employee_status',
                'name' => 'Percobaan',
                'expression' => null,
            ],
        ];

        foreach ($seed_reference as $key => $value) {
            reference::create($value);
        }

    }
}
