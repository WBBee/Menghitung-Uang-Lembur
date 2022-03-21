<?php
namespace App\Traits;

use App\Models\employe;
use Illuminate\Support\Facades\Auth;

trait WithDataTable
{
    public function getPaginationData()
    {
        switch ($this->name) {// table identity
            case 'employe':
                $user = Auth::user();
                $employees = employe::where('user_id', $user->id)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.end-point.employe',
                    "employees" => $employees,
                    "class" => 'whitespace-no-wrap text-center',
                    "data" => array_to_object([
                        'href' => [
                            // 'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];

                break;

            default:
                # code...
                break;
        }
    }
}
