@extends('layouts.admin')
@section('title')
    Quản lý
@endsection
@section('content')
    <div class="container row m-auto mt-5">
        {{--Kiem tra thong bao--}}
    @if(session('alert'))
    <div class="alert alert-info">
    {{session('alert')}}
    </div>
    @endif
    {{--Kiem tra du lieu--}}
    @if(!empty($data))
        @foreach($data as $key)
            <div class="col-3 p-2">
                <div class="card">
                    <img src="{{asset('images')}}/{{$key->images}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5  class="card-title">{{$key->product_name}}</h5>
                        @php
                        $price = number_format($key->price, 0, ',', '.') . ' vnđ'
                        @endphp
                        <p class="card-text">Số lượng sản phẩm còn lại: {{$key->product_quantity}}</p>
                        <p class="card-text">{{$price}}</p>
                        <a href="{{route('admin.edit_product',$key->id)}}" class="btn btn-primary">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection
@section('css')
    <style>
        li{
            list-style: none;
        }
        .card-title{
            height: 80px;
        }
        .card img{
            height: 350px;
        }
        
    </style>
@endsection
