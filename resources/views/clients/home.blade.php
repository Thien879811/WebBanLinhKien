
@extends('layouts.client')
@section('title')
    Trang Chu
@endsection
@section('content')
<br>
{{--Kiem tra thong bao--}}
    @if(session('alert'))
        <div class="alert alert-info">
        {{session('alert')}}
        </div>
    @endif
{{--Kiem tra du lieu--}}
    @if(!empty($data))
        @foreach($data as $key)
            <div class="card col-2" style="width: 12rem; height:30rem">
                <img src="{{asset('images')}}/{{$key->images}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$key->product_name}}</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('detail',$key->id)}}" class="btn btn-primary">Xem chi tiết</a>
                    <a href="{{ route('addcart',$key->id)}}" class="btn btn-primary mt-2">Thêm vào giỏi hàng</a>
                    <a href="{{ route('showcart') }}" class="btn btn-primary mt-2">show giỏi hàng</a>
                </div>
            </div>
        @endforeach
    @endif
@endsection
@section('css')
    <style>
    </style>
@endsection