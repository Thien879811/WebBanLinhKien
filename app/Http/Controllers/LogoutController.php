<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function getLogout(Request $request){
        if(Auth::check()){
            Auth::logout();
            $request->session()->forget('fullname');
            $request->session()->forget('admin');
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
}
