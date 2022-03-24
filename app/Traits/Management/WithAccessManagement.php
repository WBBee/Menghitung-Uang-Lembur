<?php
namespace App\Traits\management;

use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

trait WithAccessManagement
{
    public function getUsersHasRole(Role $role)
    {
        $userHasRole = User::whereHas('roles', function (Builder $query) use ($role){
                $query->where('name', '=', $role->name);
            })->get();

        return $userHasRole;
    }

    public function getAvailablePermissions(Role $role)
    {
        $permissions = Permission::whereNotIn('name', $role->getPermissionNames())->get();
        return $permissions;
    }

    public function getRoleHasPermission(Role $role)
    {
        $selfPermissions = [];
        foreach ($role->permissions as $key => $value) {
            $selfPermissions[] = [
                'id' => $value->id,
                'name' => $value->name,
                'updated_at' => Carbon::parse($value->updated_at)->format('d M Y H:i'),
            ];
        }
        return [
            'count' => count($role->permissions),
            'data' => $selfPermissions,
        ];
    }


    public function getUserHasPermission(Permission $permission)
    {
        $userHasPermission = User::whereHas('permissions', function (Builder $query) use ($permission){
            $query->where('name', '=', $permission->name);
        })->get();

        return $userHasPermission;
    }

    public function getPermissionByRole(Permission $permission)
    {
        $permissionByRole = $permission->roles;
        return $permissionByRole;
    }
}
