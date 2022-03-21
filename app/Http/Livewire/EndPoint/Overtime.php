<?php

namespace App\Http\Livewire\EndPoint;

use App\Models\employe;
use App\Models\User;
use App\Traits\EndPointOvertime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Overtime extends Component
{

    use EndPointOvertime;

    public $date_start;
    public $date_ended;
    public $uid;
    public $employe;

    public function mount()
    {
        $this->month = Carbon::now()->format('m');
        $this->employe = employe::find($this->uid);

        $this->date_start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->date_ended = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public $name;
    public $overtimes;
    public function Overtimes()
    {
        $request = [
            'id' => $this->employe->id,
            'date_start' => $this->date_start,
            'date_ended' => $this->date_ended,
        ];


        /** Validate employe id */
        $check_employe = $this->checkEmploye($request);
        if ($check_employe){
            return response()->json([
                'status' => 'failed',
                'message' => $check_employe->message
            ], 200);
        }

        $this->overtimes = $this->showUserOvertimes($request);

        // dd($this->overtimes);
    }

    public $overtimePays;
    public $month;
    public function OvertimePays()
    {
        $request = [
            'id' => $this->employe->id,
            'month' => $this->month,
        ];


        /**
         * why cannot convert to json object? (with function array_to_object)
         * IDK, but overall is ok
         * if you know why please tell me how fix this
         *      - telegram @Why_B3
         * */
        $this->overtimePays = $this->getOvertimePays($request);

        // dd($this->overtimePays);
    }

    public $confirmingOpenFilterOvertimeModal = false;

    public function render()
    {
        $this->Overtimes();
        $this->OvertimePays();
        return view('livewire.end-point.overtime');
    }
}
