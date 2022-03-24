<?php

namespace App\Http\Livewire\Management\Users;

use App\Models\User;
use App\Traits\management\WithUsersManagement;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersEdit extends Component
{
    use WithUsersManagement;

    public $user;

    public $array_roles = [];
    public $array_permissions = [];
    public $self_roles = [];
    public $self_permissions = [];

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function getDefaultValue()
    {
        $this->array_roles = $this->getAvailableRoles($this->user);
        $this->array_permissions = $this->getAvailablePermissions($this->user);

        $this->self_roles = $this->getSelfRoleList($this->user);
        $this->self_permissions = $this->getSelfPermissionList($this->user);
    }


    public $role_list;
    public function addRoleUser()
    {
        $this->validate([
            'role_list' => 'required',
        ]);
        $this->user->assignRole($this->role_list);
        $this->role_list = null;
    }

    public function removeRoleUser($id)
    {
        $role = Role::find($id);
        $this->user->removeRole($role->name);
    }

    public $permission_list;
    public function addPermissionUser()
    {
        $this->validate([
            'permission_list' => 'required',
        ]);
        $this->user->givePermissionTo($this->permission_list);
        $this->permission_list = null;
    }

    public function removePermissionUser($id)
    {
        $permission = Permission::find($id);
        $this->user->revokePermissionTo($permission->name);
    }

    public function render()
    {
        $this->getDefaultValue();
        return view('livewire.management.users.users-edit');
    }
}
