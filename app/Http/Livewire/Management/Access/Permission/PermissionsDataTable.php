<?php

namespace App\Http\Livewire\Management\Access\Permission;

use App\Traits\WithDataTable;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsDataTable extends Component
{

    use WithDataTable, WithPagination;
    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = true;
    public $search = '';

    protected $listeners = ['refresh' => '$refresh'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $this->emit('refresh');
    }

    public function render()
    {
        $data = $this->getPaginationData();

        return view($data['view'], $data);
    }
}
