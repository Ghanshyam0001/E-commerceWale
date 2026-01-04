<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNot('role', 1)->get();

        return view('admin-panel.users.list', compact('users'));
    }
    public function create()
    {
        return view('registeration');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 3;

        $user->save();

        return redirect()->route('ulogin')
            ->with('success', 'Account created successfully!');
    }

    public function loginform()
    {
        return view('loginuser');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 3,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }


        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->withInput();
    }

     public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
