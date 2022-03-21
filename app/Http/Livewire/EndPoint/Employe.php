<?php

namespace App\Http\Livewire\EndPoint;

use App\Models\employe as ModelsEmploye;
use App\Models\User;
use App\Traits\EndPointEmploye;
use App\Traits\EndPointOvertime;
use App\Traits\WithDataTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Employe extends Component
{

    use WithPagination, WithDataTable, EndPointEmploye, EndPointOvertime;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = true;
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public $confirmingOpenCreateEmployeModal = false;
    public $confirmingOpenEditEmployeModal = false;

    public $reference_key = [];
    public $status_id;
    public $employe_id;
    public $employe;

    public function showModalEditEmploye($id)
    {
        $this->employe_id = $id;
        $employe = ModelsEmploye::find($id);
        $this->status_id = $employe->status_id;
        $this->employe['name'] = $employe->name;
        $this->employe['salary'] = (Integer)$employe->salary;

        $this->confirmingOpenEditEmployeModal = true;
    }
    public function mount()
    {

        $this->reference_key = $this->getListReference('employee_status');
    }

    public function render()
    {
        $data = $this->getPaginationData();

        return view($data['view'], $data);
    }

}
