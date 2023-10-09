@extends('layouts.admin')
@section('title')
    Đơn hàng
@endsection
@section('content')
    <div class="container mt-5">
        <nav>
            <div class=" position-relative search">
                <div class="align-items-center">
                    <div class="input-group input-group1 mt-2 bg-light">
                        <input type="search" class="form-control form-control1" placeholder="Nhập từ khóa cần tìm"
                            aria-label="Search" aria-describedby="button-addon2" >
                        <button class="btn btn1 btn-dark" type="button" id="button-addon2" >
                            <a class="text-decoration-none text-light" href="#"><i class="fa fa-search "></i></a>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sum=0;
                    $stt=1
                @endphp
                @foreach ($data as $item=> $value)
                <tr>
                    <th scope="row">{{$stt}}</th>
                    <th>{{$value->fullname}}</th>
                        @php
                            $stt=$stt+1
                        @endphp
                    <th>
                        <ul>
                            @foreach ($product as $item => $key)
                            @if ($value->user_id == $key->order_id)
                                <li>
                                    {{$key->product_name}}
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach ($product as $item => $key)
                            @if ($value->user_id == $key->order_id)
                                <li>
                                    {{$key->quantity}}
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach ($product as $item => $key)
                            @if ($value->user_id == $key->order_id)
                                <li>
                                    {{$key->price}}
                                </li>
                                @php
                                    $sum=$sum+$key->total
                                @endphp
                            @endif
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        {{$sum}}
                    </th>
                    <th>
                        <a href="">in</a>
                    </th>
                </tr>
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