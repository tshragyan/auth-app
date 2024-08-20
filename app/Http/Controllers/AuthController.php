<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignInWIthSecretRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function signIn(SignInRequest $request, AuthService $service)
    {
        if ($service->signIn($request->validated())) {
            return redirect(route('users.index'));
        }

        return redirect()->back()->withErrors(['login' => 'Invalid Login Or Password']);
    }


    public function signInWithSecretForm()
    {
        return view('auth.login_with_secret');
    }


    public function signInWithSecret(SignInWIthSecretRequest $request, AuthService $authService, UserService $userService)
    {
        $user = $userService->findByData($request->validated());

        if (!$user){
            return redirect()->back->withErrors(['login' => 'Invalid Id Or Secret Key']);
        }

        $authService->signIn($user);

        return redirect(route('users.index'));
    }

    public function logout(AuthService $authService)
    {
        $authService->logout();

        return redirect(route('login'));
    }
}
