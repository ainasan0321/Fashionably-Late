<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

        return redirect('/admin/admin');
    }

    public function login(LoginRequest $request)
    {
        $login = $request->only('email', 'password');
        if (Auth::attempt($login)) {
            $request->session()->regenerate();

            return redirect('/admin/admin');
        }

        return back()
        ->withErrors(['login' => 'ログイン情報が登録されていません'])
        ->withInput($request->only('email'));
    }

        public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

}