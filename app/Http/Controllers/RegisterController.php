<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('layouts.register');
    }
    public function postRegister(RegisterRequest $request){
        $user = new User;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password);
        $user->save();
        return redirect()->route('login');
    }
}
