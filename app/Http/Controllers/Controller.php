<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function userManagement()
    {
        $allow_role = ['super-admin', 'admin'];
        $user = Auth::user();
        if ($user->hasRole($allow_role)){
            return view('pages.end-point.setting-page');
        }else{
            return 'permission denied';
            // return view('pages.error.error-permission-denied');
        }
    }

    public function endPointSetting()
    {
        return 'asda';
    }
}
