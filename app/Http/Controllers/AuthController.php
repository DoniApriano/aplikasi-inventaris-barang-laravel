<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return redirect()->route('Admin.index');
        }
        return back()->with('error', 'Email dan Password tidak cocok');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
