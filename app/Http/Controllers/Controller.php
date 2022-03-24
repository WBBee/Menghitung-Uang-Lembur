<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Access()
    {
        $user = Auth::user();
        if ($user->can('management access')){
            return view('pages.management.access.access-page',[
                'roles' => Role::class,
                'permissions' => Permission::class,
            ]);
        }else{
            return view('pages.error.error-permission-denied');
        }
    }
}
