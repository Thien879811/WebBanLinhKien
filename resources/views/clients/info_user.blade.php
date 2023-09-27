
@extends('layouts.client')
@section('title')
    Tài khoản
@endsection
@section('content')
@if (session('alert'))
    <div class="alert alert-info">{{session('alert')}}</div>
@endif
@if (!empty($user_data))
    <div>{{$user_data->fullname}}</div>
    <div>{{$user_data->email}}</div>
    <div>
        <a class="text-decoration-none text-light" href="{{ route('taikhoan.getuser') }}">Chỉnh sửa thông tin</a>
    </div>
    <div>
        <a class="text-decoration-none text-light" href="{{route('showorder')}}">Đơn hàng</a>
    </div>
    <div>
        <a class="text-decoration-none text-light" href="{{route('logout')}}">Đăng xuất</a>
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