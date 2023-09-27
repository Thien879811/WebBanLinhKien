<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getLogin(){
        return view('layouts.login');
    } 
    public function postLogin(LoginRequest $request){
        if(!Auth::check())
       {
            if( Auth::attempt(['email' => $request->email,'password' => $request->password])){
                $fullname=Auth::user()->fullname;
                $request->session()->put('fullname',$fullname);
                $admin=Auth::user()->is_admin;
                    if( $admin ==1 )
                    {
                    $request->session()->put('admin',$fullname);
                    }
                return redirect()->route('home')->with('alert','Dang nhap thanh cong'); ;
            }
            else{
                return redirect()->route('login')->with('alert','Đã có lỗi xảy ra vui lòng đăng nhập lại !');
            }
       }
        return redirect()->route('home');
    }
}
