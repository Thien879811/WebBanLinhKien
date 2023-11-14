@extends('layouts.admin')
@section('title')
   Tài khoản người dùng
@endsection
@section('content')
    <div class="container mt-5">
        <nav style="width: 600px;float:right;">
            <form action="" method="post">
                <div class=" position-relative search">
                    <div class="align-items-center">
                        <div class="input-group input-group1 mt-2 bg-light">
                            <input name='search' type="search" class="form-control form-control1" placeholder="Nhập từ khóa cần tìm"
                                aria-label="Search" aria-describedby="button-addon2" >
                                @csrf
                            <button type='submit' class="btn btn1 btn-dark" type="button" id="button-addon2" >
                                <a class="text-decoration-none text-light" href="#"><i class="fa fa-search "></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Quyền truy cập</th>
                    <th scope="col">Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt=1
                @endphp
                @foreach ($data as $item=> $value)
                <tr>
                    <th scope="col">{{$stt}}</th>
                    <th scope="col">{{$value->fullname}}</th>
                    <th scope="col">{{$value->email}}</th>
                    @if ($value->is_admin==1)
                        <th scope="col">Người dùng quản trị</th>
                        <th scope="col">
                            <a class="text-decoration-none" href="{{route('admin.not_admin',$value->id)}}">Thu hồi quyền</a>
                        </th>
                    @else
                        <th scope="col">Người dùng thông thường</th>
                        <th scope="col">
                            <a class="text-decoration-none" href="{{route('admin.is_admin',$value->id)}}">Cấp quyền</a>
                        </th>
                    @endif
                    
                </tr>
                @php
                    $stt=$stt+1
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('css')
    <style>
        li{
            list-style: none;
        }
    </style>
@endsection