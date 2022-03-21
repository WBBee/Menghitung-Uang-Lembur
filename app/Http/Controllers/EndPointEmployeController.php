<?php

namespace App\Http\Controllers;


use App\Actions\Fortify\PasswordValidationRules;
use App\Models\employe;
use App\Traits\EndPointEmploye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndPointEmployeController extends Controller
{
    use PasswordValidationRules, EndPointEmploye;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display overtimes from employe

        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'message' => '',
            'response' => $user->employees
        ], 200);

        // return $this->showUserOvertimes($request);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validate = is_field_empty([
            $request->name, $request->status_id, $request->salary,
        ]);

        if ($validate) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->message
            ], 200);
        }

        /** check status_id berdasarkan reference yang tersedia */
        $check_reference_id = $this->validateRefrenceID($request->status_id);
        if ($check_reference_id){
            return response()->json([
                'status' => 'failed',
                'message' => $check_reference_id->message
            ], 200);
        }

        /** Validate salary */
        $validate_salary = $this->validateSalary($request->salary);
        if ($validate_salary){
            return response()->json([
                'status' => 'failed',
                'message' => $validate_salary->message
            ], 200);
        }

        /** Validate uniq name */
        $user = Auth::user();
        $is_uniq_name = $this->validateName($request->name);
        if($is_uniq_name){
            return response()->json([
                'status' => 'failed',
                'message' => $is_uniq_name->message
            ], 200);
        }

        /** create new employe */

        $new_employe = new employe();
        $new_employe->name = $request->name;
        $new_employe->status_id = $request->status_id;
        $new_employe->salary = $request->salary;

        if($user->employe()->save($new_employe)){
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil membuat data employe baru'
            ], 200);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Gagal membuat data employe baru'
            ], 200);
        }
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
        if ($request->isMethod('patch')) {
            $validate = $request->validate([
                'id' => 'required|integer',
                'name' => 'required|min:2',
                'salary' => 'required|integer',
                'status_id' => 'required|integer',
            ]);

            $validate_salary = $this->validateSalary($request->salary);
            if ($validate_salary) {
               return $validate_salary;
            }

            $update_employe = $this->updateEmployeData($validate);

            if ($update_employe->status == 'success'){
                return redirect(route('endpoint.employees'));
            }else{
                return $update_employe;
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
