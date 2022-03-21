<?php
namespace App\Traits;

trait EndPointAuth
{
    private function initializeToken($user)
    {
        if ($user->token != null) {
            $user->token->delete();
        }
        return $user->createToken('auth_token')->plainTextToken;
    }
}
