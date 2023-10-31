@extends('layouts.client')
@section('title')
    Giỏ hàng
@endsection
@section('content')
@if (session('alert'))
    <div class="alert alert-info">{{session('alert')}}</div>
@endif
@if (!empty($product))
    <div class="container">
        <form action="{{route('mua-hang')}}" method="post">
            Tất cả
            <input type="checkbox" id="checkboxMain" value="">
            @foreach ($product as $item => $key)
            <div class="d-flex container row border-1 bg-info mt-2">
                <div class='col-1 m-auto'>
                    <input type="checkbox" name="selceted_add[]" class="checkbox" value="{{$key->id}}">
                </div>
                <div class="col-1 m-auto ">
                    <img src="{{asset('images')}}/{{$key->images}}" alt="" sizes="" srcset="" class="img-thumbnail">
                </div>
                <div class="col-4 m-auto">{{$key->product_name}}</div>
                <input class="price" id="price" type="hidden"value="{{$key->price}}">
                <div class="col-1 m-auto">{{$key->price}}</div>
    
                <div class="col-1 m-auto">{{$key->price}}</div>
    
                <div class="buttons_added col-2 m-auto">
    
                    <button class="plus is-form d-qty">
                        <a class="text-decoration-none" href="{{route('giam',$key->id)}}">-</a>
                    </button>
    
                    <input class="input-qty" max="10" min="{{$key->quantity}} "type="" class="quantity" id="quantity" value="{{$key->quantity}}"/>
                    
                    <button class="plus is-form d-qty" >
                        <a class="text-decoration-none" href="{{route('tang',$key->id)}}">+</a>
                    </button>
                
                </div>
                <div class="col-2 m-auto">
                    <a href="{{route('deletecart',$key->products_id)}}">Xóa</a>
                </div>
            </div>
            @endforeach
            @csrf
            <div id='sumprice'></div><button type="submit" class='mua-hang btn btn-primary mt-3'>Mua Ngay</button>
        </form>
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