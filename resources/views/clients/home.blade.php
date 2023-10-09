
@extends('layouts.client')
@section('title')
    Trang Chu
@endsection
@section('content')
    <div>
        <h3>Chọn sản phẩm</h3>
    </div>
    <div>
        <h3>Chọn tiêu chí</h3>
    </div>
    <h2>Sản phẩm</h2>
    <div class="row">
        {{--Kiem tra thong bao--}}
        @if(session('alert'))
        <div class="alert alert-info">
        {{session('alert')}}
        </div>
        @endif
        {{--Kiem tra du lieu--}}
        @if(!empty($data))
            @foreach($data as $key)
                <div class="card col-3">
                    <img src="{{asset('images')}}/{{$key->images}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$key->product_name}}</h5>
                        <p class="card-text">{{$key->price}}</p>
                        <a href="{{ route('detail',$key->id)}}" class="btn btn-primary">Xem chi tiết</a>
                        <a href="{{ route('addcart',$key->id)}}" class="btn btn-primary mt-2">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
@section('css')
    <style>
        .card{
            width: 30rem
        }
    </style>
@endsection