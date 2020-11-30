<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function checkLogin(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        if(Auth::attempt(['ma_gv' => $username, 'password' => $password, 'role_id' => 1])){
            return redirect()->route('voyager.dashboard');
        }elseif(Auth::attempt(['ma_gv' => $username, 'password' => $password, 'role_id' => 3])){
            return redirect()->route('homeTeacher');
        }elseif(Auth::attempt(['ma_hs' => $username, 'password' => $password, 'role_id' => 4])){
            return redirect()->route('homeStudent');
        }else{
            return redirect()->back()->with('message', 'Mã đăng nhập hoặc mật khẩu của bạn không đúng!');
        }
    }
}
