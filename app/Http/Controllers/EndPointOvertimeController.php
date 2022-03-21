<?php

namespace App\Http\Controllers;

use App\Traits\EndPointOvertime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndPointOvertimeController extends Controller
{
    use EndPointOvertime;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // display overtimes from employe
        $validate = is_field_empty([
            $request->id, $request->date_start, $request->date_ended
        ]);

        if ($validate) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->message
            ], 200);
        }

        $request = [
            'id' => $request->id,
            'date_start' => Carbon::parse($request->date_start)->format('Y-m-d'),
            'date_ended' => Carbon::parse($request->date_ended)->format('Y-m-d'),
        ];


        /** Validate employe id */
        $check_employe = $this->checkEmploye($request);
        if ($check_employe){
            return response()->json([
                'status' => 'failed',
                'message' => $check_employe->message
            ], 200);
        }


        return response()->json([
            'status' => 'success',
            'message' => '',
            'response' => $this->showUserOvertimes($request),
        ], 200);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validate = is_field_empty([
            $request->employee_id, $request->date, $request->time_started, $request->time_ended
        ]);

        if ($validate) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->message
            ], 200);
        }

        $request = [
            'id' => $request->employee_id,
            'date' => Carbon::parse($request->date),
            'time_started' => Carbon::parse($request->date.' '.$request->time_started),
            'time_ended' => Carbon::parse($request->date.' '.$request->time_ended),
        ];


        /** Validate employe id */
        $check_employe = $this->checkEmploye($request);
        if ($check_employe){
            return response()->json([
                'status' => 'failed',
                'message' => $check_employe->message
            ], 200);
        }



        return $this->createOvertime($request);

    }


    public function overtimePays(Request $request)
    {
        $validate = is_field_empty([
            $request->employe_id, $request->month,
        ]);

        if ($validate) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->message
            ], 200);
        }

        $request = [
            'id' => $request->employe_id,
            'month' => Carbon::parse($request->month)->format('m'),
        ];

        return response()->json([
            'status' => 'success',
            'message' => '',
            'response' => $this->getOvertimePays($request),
        ], 200);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
