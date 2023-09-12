<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function update(Request $request, $id)
    {
        $content = User::query()->where("id",$id)->first();
        $request->validate([
            "name" => 'required',
            "username" => 'required'
        ]);
        if($request->input("password") != null){
            if($request->input("password") == $request->input("kpassword")){

                $request->validate([
                    "password" => 'min:5',
                ]);

                $payload = [
                    "name" => $request->input("name"),
                    "username" => $request->input("username"),
                    "password" => $request->input("password"),
                    "id_role" => $request->input("id_role")
                ];
                
            }else{
                return redirect()->back()->with(['error' => 'Password dan konfirmasi password tidak cocok']);
            }
        }else{
            $payload = [
                "name" => $request->input("name"),
                "username" => $request->input("username")
            ];
        }
        // dd($payload);

        $content->fill($payload);
        $content->save();

        // dd($user);

        Session::put('logus', $content);
 

        return redirect()->back()->with(['success' => 'Data terupdate']);
    } // untuk update data
}
