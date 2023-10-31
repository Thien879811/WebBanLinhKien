
@extends('layouts.client')
@section('title')
    Trang chủ
@endsection
@section('content')
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
            <div class="col-md-3 p-2">
                <div class="card">
                    <img src="{{asset('images')}}/{{$key->images}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$key->product_name}}</h5>
                        <p class="card-text">{{$key->price}}</p>
                        <a href="{{ route('detail',$key->id)}}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
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