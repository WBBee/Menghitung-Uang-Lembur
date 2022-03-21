<?php
namespace App\Traits;

use App\Models\reference;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\employe;
use App\Models\profile;
use App\Models\setting;
use Illuminate\Support\Facades\Auth;

trait EndPointEmploye
{

    public function validateRefrenceID($status_id)
    {
        $reference = reference::where('code', 'employee_status')
        ->where('id', $status_id)
        ->first();

        if (!$reference) {
            return array_to_object([
                'status' => 'failed',
                'message' => 'status_id tidak sesuai dengan referensi yang tersedia',
            ]);
        }
    }

    public function validateSalary($salary)
    {
        if ((Integer)$salary < 2000000 ) {
            return array_to_object([
                'status' => 'failed',
                'message' => 'Permintaan gaji tidak boleh lebih rendah dari yang di tentukan',
            ]);
        }else if ((Integer)$salary > 10000000 ) {
            return array_to_object([
                'status' => 'failed',
                'message' => 'Permintaan gaji tidak boleh lebih tinggi dari yang di tentukan',
            ]);
        }
    }


    public function validateName(string $name)
    {
        $employe = employe::where('name', $name)->first();
        if ($employe) {
            return array_to_object([
                'status' => 'failed',
                'message' => 'Name employe telah digunakan',
            ]);
        }
    }




    public function getListReference($reference = 'overtime_method')
    {
        $reference = reference::where('code', $reference)->get();
        $reference_array = [];
        for ($i=0; $i < $reference->count(); $i++) {
            $reference_array[] = [
                'id' => $reference[$i]->id,
                'code' => $reference[$i]->code . ' - ' . $reference[$i]->name,
            ];
        }
        return $reference_array;
    }

    public function createEmployeData(array $data)
    {

        $validate_duplicate = User::where('name', $data['name'])
            ->orWhere('email', $data['email'])->first();

        if($validate_duplicate != null){
            return array_to_object([
                'status' => 'failed',
                'message' => 'Name or Email already taken',
            ]);
        }

        $new_user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $new_profile = new profile();
        $new_profile->level = 'user';
        $new_user->profile()->save($new_profile);

        $new_employe = new employe();
        $new_user->employe()->save($new_employe);

        $new_setting = new setting();
        $value = 2;
        $reference = reference::find($value);
        $new_setting->value = $value;
        $new_setting->expression = $reference->expression;
        $new_user->setting()->save($new_setting);

        $new_user->save();

        return array_to_object([
            'status' => 'sucess',
            'message' => 'Data created successfuly',
        ]);
    }

    public function updateEmployeData(array $data)
    {
        $employe = employe::find($data['id']);

        if($employe->name != $data['name'] && $this->validateName($data['name'])){
            return array_to_object([
                'status' => 'failed',
                'message' => 'Name already taken',
            ]);
        }

        $employe->name = $data['name'];
        $employe->salary = $data['salary'];
        $employe->status_id = $data['status_id'];
        $employe->save();

        return array_to_object([
            'status' => 'success',
            'message' => 'Data updated successfuly',
        ]);

    }



}
