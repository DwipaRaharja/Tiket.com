<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user' // dipaksa user
        ]);

        return redirect('/login');
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            if (Auth::user()->role == 'user') {
                return redirect('/home');
            }

        }

        return back()->with('error', 'Login gagal');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
