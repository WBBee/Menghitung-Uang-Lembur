<?php

namespace App\Http\Livewire\Management\Users;

use App\Traits\WithDataTable;
use Livewire\Component;
use Livewire\WithPagination;

class UsersDataTable extends Component
{
    use WithDataTable, WithPagination;

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

    public function render()
    {
        $data = $this->getPaginationData();

        return view($data['view'], $data);
    }
}
