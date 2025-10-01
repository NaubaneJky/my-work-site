<?php

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // ambil semua user
        return view('users.index', ['users' => $users]);
    }
}

