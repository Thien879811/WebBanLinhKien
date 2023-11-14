
@extends('layouts.client')
@section('title')
    Trang chủ
@endsection
@section('content')
    @if (!empty($loai))
        <h3>Chọn linh kiện</h3>
        <div class="d-flex">
                @foreach ($loai as $item)
                <form action="{{route('home')}}" method="post">
                    <input type="hidden" name='search' value="{{$item->name}}">
                    @csrf
                    <button type='submit' class="border border-dark p-2 m-2 rounded btn">
                        {{$item->name}}
                    </button>
                </form>
                @endforeach
        </div>
    @endif
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
        @else
            <div class="alert alert-danger">
                Không tìm thấy!
            </div>
        @endif
    </div>
@endsection
@section('css')
    <style>
        .card{
            width: 30rem
        }
        .card-title{
            height: 80px;
        }
        .card img{
            height: 350px;
        }
    </style>
@endsection