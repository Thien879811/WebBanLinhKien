<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Flash\AutoExpireFlashBag;

class UserController extends Controller
{
    public function checkInfo(){
        $user_id=Auth::id();
        $user_data=User::find($user_id);
        if( $user_data -> count()>0){
            if($user_data->address != null && $user_data->phone != null){
                return 1;
            }
        }
        return 0;
    }

    public function getUser(){
        $user_id=Auth::id();
        $user_data=User::find($user_id);
        return view('clients.edit_info_user',compact('user_data'));
    }
    public function updateUser(UserRequest $request){
        $user=Auth::id();
        $user_data=User::find($user);
        $user_data->fullname=$request->fullname;
        $user_data->email=$request->email;
        $user_data->address=$request->address;
        $user_data->phone=$request->phone;
        $user_data->update();
        return redirect()->route('home')->with('alert','Cập nhật thông thành công');
    }
    public function showUser(){
        $user=Auth::id();
        $user_data=User::find($user);
        return view('clients.info_user',compact('user_data'));
    }
    public function user(){
        $data=User::select('fullname','email','is_admin')->get();
        return view('admin.user',compact('data'));
    }
}
