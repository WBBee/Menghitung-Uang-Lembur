<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\EndPointOvertime;
use App\Traits\EndPointSetting;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use EndPointSetting;

    public function endPointSetting()
    {
        $allow_level = ['admin'];
        $user = Auth::user();
        if (in_array($user->profile->level, $allow_level)) {
            return view('pages.end-point.setting-page');
        }else{
            return 'permission denied';
            // return view('pages.error.error-permission-denied');
        }
    }

    public function endPointEmploye()
    {
        $allow_level = ['admin'];
        $user = Auth::user();
        if (in_array($user->profile->level, $allow_level)) {
            return view('pages.end-point.employe-page', [
                'user_employe' => User::class,
            ]);
        }else{
            return 'permission denied';
            // return view('pages.error.error-permission-denied');
        }
    }

    // public function endPointOvertime()
    // {
    //     $allow_level = ['admin', 'user'];
    //     $user = Auth::user();
    //     if (in_array($user->profile->level, $allow_level)) {
    //         return view('pages.end-point.overtime-page', [
    //             'uid' => $user->id,
    //         ]);
    //     }else{
    //         return 'permission denied';
    //         // return view('pages.error.error-permission-denied');
    //     }
    // }
    public function endPointOvertimeUser($id)
    {
        $allow_level = ['admin'];
        $user = Auth::user();
        if (in_array($user->profile->level, $allow_level)) {
            return view('pages.end-point.overtime-page', [
                'uid' => $id,
            ]);
        }else{
            return 'permission denied';
            // return view('pages.error.error-permission-denied');
        }
    }
}
