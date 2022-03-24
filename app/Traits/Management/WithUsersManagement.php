<?php
namespace App\Traits\management;

use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

trait WithUsersManagement
{
    public function getAvailableRoles(User $user)
    {
        $role = Role::whereNotIn('name', $user->getRoleNames())->get();
        return $role;
    }

    public function getAvailablePermissions(User $user)
    {
        $permission = Permission::whereNotIn('name', $user->getPermissionNames())->get();
        return $permission;
    }

    public function getSelfRoleList(User $user)
    {
        $selfRoles = [];
        foreach ($user->roles as $key => $value) {
            $selfRoles[] = [
                'id' => $value->id,
                'name' => $value->name,
                'updated_at' => Carbon::parse($value->updated_at)->format('d M Y H:i'),
            ];
        }
        return [
            'count' => count($user->roles),
            'data' => $selfRoles,
        ];
    }

    public function getSelfPermissionList(User $user)
    {
        $selfPermissions = [];
        foreach ($user->permissions as $key => $value) {
            $selfPermissions[] = [
                'id' => $value->id,
                'name' => $value->name,
                'updated_at' => Carbon::parse($value->updated_at)->format('d M Y H:i'),
            ];
        }
        return [
            'count' => count($user->permissions),
            'data' => $selfPermissions,
        ];
    }
}
