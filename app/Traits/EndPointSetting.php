<?php
namespace App\Traits;

use App\Models\reference;
use App\Models\setting;
use Illuminate\Support\Facades\Auth;

trait EndPointSetting
{
    public function getDataSetting()
    {
        $setting = setting::first();

        return array_to_object([
            'key' => $setting->key,
            'expression' => $setting->expression,
        ]);

    }

    public function getListReference()
    {
        $reference = reference::where('code', 'overtime_method')->get();
        $reference_array = [];
        for ($i=0; $i < $reference->count(); $i++) {
            $reference_array[] = [
                'id' => $reference[$i]->id,
                'code' => $reference[$i]->code . ' - ' . $reference[$i]->name,
            ];
        }
        return $reference_array;
    }

    public function updateSettingPreference($id)
    {
        $setting = setting::first();;

        $reference = reference::find($id);
        // return $reference->expression;

        $setting->value = $id;
        $setting->expression = $reference->expression;
        return $setting->save();

    }
}
