
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
    @if(!empty($product))
        @foreach($product as $key => $value)
            <div class="d-flex container row border-1 bg-info mt-2">
                <div class="col-1 m-auto ">
                    <img src="{{asset('images')}}/{{$value->images}}" alt="" sizes="" srcset="" class="img-thumbnail">
                </div>
                <div class="col-4 m-auto">{{$value->product_name}}</div>
                <div class="col-1 m-auto">{{$value->price }}</div>
                <div class="col-1 m-auto">{{ $value->total}}</div>
            </div>
        @endforeach
    @endif
@endsection
@section('css')
    <style>
    </style>
@endsection
