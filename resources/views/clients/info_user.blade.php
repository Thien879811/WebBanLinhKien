
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
       <div class="info-group">
            <div>
                <div class="avt-block">
                    <i class="fa-solid avt fa-user"></i>
                </div>
                <div class="name">
                    <h3>{{$user_data->fullname}}</h3>
                </div>
            </div>
            <div class="justify-content-center">
                <div>Email: {{$user_data->email}}</div>
                <div>Địa chỉ: {{$user_data->address}}</div>
                <div>Điện thoại: {{$user_data->phone}}</div>
                <div>
                    <a class="text-decoration-none" href="{{ route('taikhoan.getuser') }}">Chỉnh sửa thông tin</a>
                </div>
                <div>
                    <a class="text-decoration-none" href="{{route('showorder')}}">Đơn hàng</a>
                </div>
                <div>
                    <a class="text-decoration-none " href="{{route('logout')}}">Đăng xuất</a>
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