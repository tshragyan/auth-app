<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function signIn($data)
    {
        if (!($data instanceof User) && Auth::attempt($data)) {
            return true;
        } else if ($data instanceof User) {
            Auth::login($data);
            return true;
        }

        return false;
    }

    public function logout()
    {
        Auth::logout();
    }
}
