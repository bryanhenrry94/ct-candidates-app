<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('todos')->latest()->get();
        return view('users.index', ['users' => $users]);
    }

    public function store(UserRequest $request)
    {
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
