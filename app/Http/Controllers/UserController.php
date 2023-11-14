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
    //thông tin tài khoản chỉnh sửa
    public function getUser(){
        $user_id=Auth::id();
        $user_data=User::find($user_id);
        return view('clients.edit_info_user',compact('user_data'));
    }
    //cập nhật thông tin
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
    //hiển thị thông tin 
    public function showUser(){
        $user=Auth::id();
        $user_data=User::find($user);
        return view('clients.info_user',compact('user_data'));
    }
    //lấy tài khoản đã đăng nhập trong hệ thống
    public function user(){
        $data=User::select('id','fullname','email','is_admin')->get();
        return view('admin.user',compact('data'));
    }
    public function is_admin($id){
        $user_data=User::find($id);
        $user_data->is_admin=1;
        $user_data->save();
        return redirect()->route('admin.user')->with('alert','Cập nhật thông thành công');
    }
    public function not_admin($id){
        $user_data=User::find($id);
        $user_data->is_admin=0;
        $user_data->save();
        return redirect()->route('admin.user')->with('alert','Thu hồi thành công');
    }
    public function search_user(Request $request){
        $key=$request->search;
        $data=User::where('fullname','LIKE','%'.$key.'%')->orWhere('email','LIKE','%'.$key.'%')->get();
        return view('admin.user',compact('data'));
    }
}
