<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait WithDataTable
{
    public function getPaginationData()
    {
        switch ($this->name) {
            case 'users':
                $user = Auth::user();

                $users = $this->model::search($this->search)
                    // ->whereHas('roles', function (Builder $query) use ($user){
                    //     $query->whereNotIn('name', $user->getRoleNames());
                    // })
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.management.users.users-data-table',
                    "users" => $users,
                    "class" => 'nowrap text-center',
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


            case 'roles':
                $roles = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.management.access.role.roles-data-table',
                    "roles" => $roles,
                    "class" => 'nowrap text-center',
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

            case 'permissions':
                $permissions = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

            return [
                "view" => 'livewire.management.access.permission.permissions-data-table',
                "permissions" => $permissions,
                "class" => 'nowrap text-center',
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
