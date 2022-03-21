<?php

namespace App\Http\Livewire\EndPoint;

use App\Models\setting as ModelsSetting;
use App\Traits\EndPointSetting;
use Livewire\Component;

class Setting extends Component
{

    use EndPointSetting;


    public $display_key_code = null;
    public $display_expression = null;

    public $confirmingOpenSettingModal = false;

    public $reference_key = [];
    public $setting_reference;

    public $setting;

    public function showModalUpdateSetting()
    {
        $this->reference_key = $this->getListReference();

        $this->confirmingOpenSettingModal = true;
    }

    public function mount()
    {
        $setting = ModelsSetting::first();
        $this->setting_reference = $setting->value;
        $this->display_key_code = $this->getDataSetting()->key;
        $this->display_expression = $this->getDataSetting()->expression;
    }

    public function render()
    {
        return view('livewire.end-point.setting');
    }
}
