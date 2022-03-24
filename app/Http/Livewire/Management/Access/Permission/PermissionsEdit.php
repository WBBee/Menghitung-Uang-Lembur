<?php

namespace App\Http\Livewire\Management\Access\Permission;

use App\Models\User;
use App\Traits\management\WithAccessManagement;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsEdit extends Component
{

    use WithAccessManagement;

    public $permission;

    public function mount($id)
    {
        $this->permission = Permission::find($id);
    }

    public $users_has_permission = [];
    public $role_has_permission = [];

    public function getDefaultValue()
    {
        $this->users_has_permission = $this->getUserHasPermission($this->permission);
        $this->role_has_permission = $this->getPermissionByRole($this->permission);
    }

    public function removePermissionRole($id)
    {
        $role = Role::find($id);
        $role->revokePermissionTo($this->permission->name);
    }

    public function render()
    {
        $this->getDefaultValue();
        return view('livewire.management.access.permission.permissions-edit');
    }
}
