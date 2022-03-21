<?php

namespace Database\Seeders;

use App\Models\employe;
use App\Models\overtime;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OvertimeGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = employe::get();

        for ($i=0; $i < count($employees); $i++) {
            $employe = employe::find($employees[$i]->id);
            $this->createOvertimeSeeder($employe);
        }
    }


    public function createOvertimeSeeder($employe)
    {
        for ($i=0; $i < 31; $i++) {
            $date = Carbon::now()->addDay(-$i)->format('Y-m-d');

            $generate_time = $this->generateTime($date);

            $overtime = new overtime();
            $overtime->date = $generate_time->date;
            $overtime->time_started = Carbon::parse($generate_time->time_start)->format('Y-m-d H:i');
            $overtime->time_ended = $generate_time->time_ended;
            $employe->overtime()->save($overtime);
        }

    }

    public function generateTime($parseDate)
    {
        $date = Carbon::parse($parseDate)->format('Y-m-d');
        $time_start = Carbon::parse($date)->addHour(rand(8, 10))->addMinute(rand(1,59));
        $time_ended = Carbon::parse($time_start)->addHour(8)->addHour(1, 10)->addMinute(rand(1,59));
        return array_to_object([
            'date' => $date,
            'time_start' => $time_start->format('Y-m-d H:i'),
            'time_ended' => $time_ended->format('Y-m-d H:i'),
        ]);
    }
}
