<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(UserService $userService)
    {
        $user = auth()->user();
        $users = $user->is_admin ? $userService->getUsers() : null;
        return view('users.index', compact('user', 'users'));
    }
}
