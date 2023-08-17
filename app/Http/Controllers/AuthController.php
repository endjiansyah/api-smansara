<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    // function Pagelogin(Request $request)
    // {
    //     if ($request->method() == 'GET') {
    //         return view('formlogin');
    //     }

    //     $username = $request->input("username");
    //     $password = $request->input('password');
    //     $user = User::query()->where("username", $username)->first();

    //     if ($user == null) {
    //         return redirect()->back()->withErrors(['message' => 'Email salah!!']);
    //     }
    //     if (!Hash::check($password, $user->password)) {
    //         return redirect()->back()->withErrors(['message' => 'Password Salah']);
    //     }
    //     if (!session()->isStarted()) session()->start();
    //     session()->put('logged', true);
    //     session()->put('logus', $user);

    //     return redirect()->route('user.dashboard');
    // }

    // function Pagelogout()
    // {
    //     session()->flush();
    //     return redirect()->route('login');
    // }

    // ----------------------------------------

    function login(Request $request)
    {
        $user = User::query()
            ->where("username", $request->input("username"))
            ->first();
        
        // cek user berdasarkan email (availability user)
        if ($user == null) {
            return response()->json([
                "status" => false,
                "message" => "Email tidak ditemukan",
                "data" => 'email'
            ]);
        }

        // cek password
        if (!Hash::check($request->input("password"), $user->password)) {
            return response()->json([
                "status" => false,
                "message" => "Password salah",
                "data" => 'password'
            ]);
        }

        // buat token untuk authorisasi
        $token = $user->createToken("auth_token");
        return response()->json([
            "status" => true,
            "message" => "token berhasil dibuat",
            "data" => [
                "auth" => [
                    "token" => $token->plainTextToken,
                    "token_type" => 'Bearer'
                ],
                "user" => $user
            ]
        ]);
    }

    function getUser(Request $request)
    {
        $user = $request->user();
        return response()->json([
            "status" => true,
            "message" => "data user",
            "data" => $user
        ]);
    }

    function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            "status" => true,
            "message" => "Sukses Logout",
            "data" => $user
        ]);
    }

    function store(Request $request){
        $payload = [
            "name" => $request->input("name"),
            "username" => $request->input("username"),
            "password" => $request->input("password"),
        ];

        $validator = Validator::make($payload,[
            "name" => 'required',
            "username" => 'required',
            "password" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
                "data" => null
            ]);
        }

        $count = User::where('username', '=', $payload['username'])->count();

        if ($count > 0) {
            return response()->json([
                "status" => false,
                "message" => "username sudah terdaftar",
                "data" => 'username'
            ]);
        }

        $content = User::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "data tersimpan",
            "data" => $content
        ]);
    }
}
