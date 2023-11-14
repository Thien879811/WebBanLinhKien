
@extends('layouts.client')
@section('title')
    Tài khoản
@endsection
@section('content')
@if (session('alert'))
    <div class="alert alert-info">{{session('alert')}}</div>
@endif
@if (!empty($user_data))
    <div class="container mt-3 d-flex justify-content-center">
       <div class="info-group border border-dark">
            <div class="border-bottom-2 border-dark">
                <div class="avt-block">
                    <i class="fa-solid avt fa-user"></i>
                </div>
                <div class="name">
                    <h3>{{$user_data->fullname}}</h3>
                </div>
            </div>
            <div class="justify-content-center info_center">
                <h4 class="text-align-center">Thông tin cá nhân</h4>
                <div class="info">
                    <ul>
                        <li>Email: {{$user_data->email}}</li>
                        <li>Địa chỉ: {{$user_data->address}}</li>
                        <li>Điện thoại: 0{{$user_data->phone}}</li>
                    </ul>
                </div>
                <h4 class="mt-2">Tùy chỉnh</h4>
                <div class="info">
                    <ul>
                        <li><a class="text-decoration-none" href="{{ route('taikhoan.getuser') }}">Chỉnh sửa thông tin</a></li>
                        <li><a class="text-decoration-none" href="{{route('showorder')}}">Đơn hàng</a></li>
                        <li> <a class="text-decoration-none " href="{{route('logout')}}">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
@section('javascript')
    <script src="{{asset('assets/clients/js/cart.js')}}"></script>
@endsection
@section('css')
    <style>
        .d-qty{
            width:30px;
        }
        .input-qty{
            width:50px
        }
    </style>
@endsection