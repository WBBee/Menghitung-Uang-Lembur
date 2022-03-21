<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\EndPointAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    use EndPointAuth;
    public function Login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kombinasi email dan password tidak cocok!.'
            ], 200);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        return response()->json([
            'status' => 'success',
            'auth_token' => $this->initializeToken($user),
        ], 200);
    }
}
