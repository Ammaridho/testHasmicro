<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;

use Illuminate\Support\Str;
use Session;

class authController extends Controller
{
    public function login(Request $request)
    {
        $data = user::where('username',$request->username)->first();
        // nested If
        if($data){
            if(password_verify($request->password,$data->password)){
                session(['session_login' => true]);
                $request->session()->put('data',$request->input());

                return redirect('/')->with(['success' => 'berhasil Masuk!']);
            }
        }
        return redirect('/')->with(['error' => 'username atau Password Salah!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with(['success','berhasil logout!']);
    }

}
