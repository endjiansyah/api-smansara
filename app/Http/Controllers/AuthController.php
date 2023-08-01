<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('formlogin');
        }

        $username = $request->input("username");
        $password = $request->input('password');
        $admin = Admin::query()->where("username", $username)->first();

        if ($admin == null) {
            return redirect()->back()->withErrors(['message' => 'Email salah!!']);
        }
        if (!Hash::check($password, $admin->password)) {
            return redirect()->back()->withErrors(['message' => 'Password Salah']);
        }
        if (!session()->isStarted()) session()->start();
        session()->put('logged', true);
        session()->put('logus', $admin);

        return redirect()->route('admin.dashboard');
    }

    function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
