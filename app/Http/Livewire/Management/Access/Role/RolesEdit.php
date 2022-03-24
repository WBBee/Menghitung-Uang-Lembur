<?php

namespace App\Http\Livewire\Management\Access\Role;

use App\Models\User;
use App\Traits\management\WithAccessManagement;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesEdit extends Component
{
    use WithAccessManagement;

    public $role;
    public function mount($id)
    {
        $this->role = Role::find($id);
    }

    public $users_has_role = [];
    public $array_permissions = [];
    public $role_has_permission = [];

    public function getDefaultValue()
    {
        $this->users_has_role = $this->getUsersHasRole($this->role);
        $this->array_permissions = $this->getAvailablePermissions($this->role);
        $this->role_has_permission = $this->getRoleHasPermission($this->role);
    }

    public function removeUserRole($id)
    {
        $user = User::find($id);
        $user->removeRole($this->role->name);
    }

    public $permission_list;
    public function addPermissionRole()
    {
        $this->validate([
            'permission_list' => 'required',
        ]);
        $this->role->givePermissionTo($this->permission_list);
        $this->permission_list = null;
    }
    public function removePermissionRole($id)
    {
        $permission = Permission::find($id);
        $this->role->revokePermissionTo($permission->name);
    }

    public function render()
    {
        $this->getDefaultValue();
        return view('livewire.management.access.role.roles-edit');
    }
}
