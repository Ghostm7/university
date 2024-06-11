<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index',[
            'users' => $users
        ]);
        
    }

    public function create()
    {
        return view('role-permission.user.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            

        ]);
    }
}
