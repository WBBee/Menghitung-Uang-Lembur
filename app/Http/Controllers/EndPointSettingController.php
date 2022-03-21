<?php

namespace App\Http\Controllers;

use App\Traits\EndPointSetting;
use Illuminate\Http\Request;

class EndPointSettingController extends Controller
{
    use EndPointSetting;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        // return $request->key;

        if ($request->isMethod('patch')) {
            $userData = $request->input();

            /** check field */
            $validate = is_field_empty([
                $userData['key'],
            ]);

            if ($validate) {
                return response()->json([
                    'status' => 'failed',
                    'message' => $validate->message
                ], 200);
            }

            $is_setting_updated = $this->updateSettingPreference($userData['key']);

            if ($is_setting_updated){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil di perbarui',
                ], 200);
            }else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Data gagal di perbarui',
                ], 200);
            }


        }
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
