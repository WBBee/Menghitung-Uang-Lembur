<?php
namespace App\Traits;

use App\Models\employe;
use App\Models\overtime;
use App\Models\setting;
use Carbon\Carbon;

trait EndPointOvertime
{

    public function showUserOvertimes(array $array)
    {

        $employe = employe::find($array['id']);
        // validate date
        if (Carbon::parse($array['date_start']) >= Carbon::parse($array['date_ended'])) {
            return array_to_object([
                'status' => 'failed',
                'message' => 'Date Start cannot greater than or same with Date Ended',
            ]);
        }
        $overtime_data = overtime::where('employe_id', $array['id'])
            ->whereBetween('date', [
                $array['date_start'], $array['date_ended']
            ]
        )->get();

        $response = [];
        for ($i=0; $i < count($overtime_data); $i++) {
            $get_overtime_start = Carbon::parse($overtime_data[$i]->time_started)->addHour(8);
            $minutes = Carbon::parse($overtime_data[$i]->time_ended)->diffInMinutes($get_overtime_start);
            $overtime_work = round($minutes/60, 1).' hour';
            $response[] = array_to_object([
                'id' => $overtime_data[$i]->id,
                'employe_id' => $overtime_data[$i]->employe_id,
                'employe_name' => $employe->name,
                'date' => $overtime_data[$i]->date,
                'time_started' => $overtime_data[$i]->time_started,
                'time_ended' => $overtime_data[$i]->time_ended,

                'overtime_duration' => $overtime_work,
                'estimate_earning' => currency_format($this->calculateOvertimePay(
                    $employe->salary,
                    (Integer)str_replace("hour","", $overtime_work),
                    $employe->status_id
                )),
            ]);
        }

        return $response;
    }

    public function checkEmploye(array $array)
    {
        $employe = employe::find($array['id']);
        if (!$employe) {
            return array_to_object([
               'status' => 'failed',
               'message' => 'Data Employe tidak ditemukan',
            ]);
        }
    }

    public function isOvertimeAvailable($date)
    {
        $overtime = overtime::whereDate('date', $date)->first();

        if($overtime){
            return true;
        }
    }

    public function createOvertime(array $array)
    {

        $employe = employe::find($array['id']);
        // create & update overtime using relationship

        /** check when overtime date exist */
        if($this->isOvertimeAvailable($array['date'])){
            return response()->json([
                'status' => 'failed',
                'message' => 'Tanggal overtime telah ada, gunakan tanggal lain',
            ], 200);
        }

        $new_overtime = new overtime();
        $new_overtime->date = $array['date'];
        $new_overtime->time_started = $array['time_started'];
        $new_overtime->time_ended = $array['time_ended'];
        $employe->overtime()->save($new_overtime);
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil membuat data overtime baru',
        ], 200);
    }

    public function getOvertimePays(array $array)
    {
        $employe = employe::find($array['id']);
        $overtime = overtime::where('employe_id', $employe->id)
            ->whereMonth('date', $array['month'])->get();


        $overtimes = $this->calculateOvertime($array['id'], $overtime);
        $overtimeDurationTotal = $this->calculatoOvertimeDurationTotal($overtimes);
        $amout = $this->calculateOvertimePay(
            (Integer)$employe->salary,
            (Integer)str_replace("hour","", $overtimeDurationTotal->overtime_duration_total),
            (Integer)$employe->status_id
        );



        return [
            'id' => $employe->id,
            'name' => $employe->name,
            'status_id' => $employe->status_id,
            'status_name' => $employe->reference->name,
            'salary' => $employe->salary,
            'overtimes' => $overtimes,
            'overtimes_duration_total' => $overtimeDurationTotal,
            'amount' => currency_format($amout),
        ];

    }

    public function calculateOvertime($employe_id, $overtime_data)
    {

        $employe = employe::find($employe_id);
        $overtime_array = [];
        for ($i=0; $i < count($overtime_data); $i++) {
            // ignore if data not filled
            if($overtime_data[$i]->time_started == null || $overtime_data[$i]->time_ended == null ){
                continue;
            }

            $get_overtime_start = Carbon::parse($overtime_data[$i]->time_started)->addHour(8);
            $minutes = Carbon::parse($overtime_data[$i]->time_ended)->diffInMinutes($get_overtime_start);
            $overtime_work = round($minutes/60, 1).' hour';
            $overtime_array[] = array_to_object([
                'date' => $overtime_data[$i]->date,
                'time_start' => $overtime_data[$i]->time_started,
                'time_ended' => $overtime_data[$i]->time_ended,
                'overtime_duration' => $overtime_work,
                'estimate_earning' => currency_format($this->calculateOvertimePay(
                    $employe->salary,
                    (Integer)str_replace("hour","", $overtime_work),
                    $employe->status_id
                )),
            ]);
        }
        return $overtime_array;
    }

    public function calculateOvertimePay($salary, $overtime_duration_total, $formula)
    {

        $setting = setting::first();
        if($formula == 3){
            /** min overtime required */
            if ((Integer)$overtime_duration_total < 1){
                return 0;
            }
            if ($setting->value == 1){
                $math = ($salary / 173)* $overtime_duration_total;
                $serialize = explode(".",$math);

                return (Integer)$serialize[0];
            }else{
                return 10000* $overtime_duration_total;
            }
        }else if($formula == 4){
            if ((Integer)$overtime_duration_total < 2){
                return 0;
            }
            if ($setting->value == 1){
                $math = ($salary / 173)* ($overtime_duration_total / 2);
                $serialize = explode(".",$math);
                return (Integer)$serialize[0];
            }else{
                return 10000* ($overtime_duration_total / 2);
            }
        }
        return $estimate_fee = 0;
        return array_to_object([
            'date' => '',
            'time_started' => '',
            'time_ended' => '',
        ]);
    }

    public function calculatoOvertimeDurationTotal(array $overtimes)
    {

        $overtimeDurationTotal = 0;
        $overtimeDurationTotal_array = [];
        foreach ($overtimes as $key => $value) {
            $e =  str_replace("hour","", $value->overtime_duration);
            $overtimeDurationTotal = $overtimeDurationTotal + (Integer)$e;
            $overtimeDurationTotal_array[] = $e;
        }
        return array_to_object([
            'overtime_duration_total' => $overtimeDurationTotal.' hour',
            'overtime_duration_total_history' => $overtimeDurationTotal_array,
        ]);
    }


}
