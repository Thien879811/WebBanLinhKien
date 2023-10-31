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
            <div class="card col-3">
                <img src="{{asset('images')}}/{{$key->images}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$key->product_name}}</h5>
                    <p class="card-text">{{$key->price}}</p>
                    <a href="{{route('admin.edit_product',$key->id)}}" class="btn btn-primary">Chỉnh sửa</a>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection