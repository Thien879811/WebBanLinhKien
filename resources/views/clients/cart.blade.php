@extends('layouts.client')
@section('title')
    Giỏ hàng
@endsection
@section('content')
@if (session('alert'))
    <div class="alert alert-info">{{session('alert')}}</div>
@endif
@if (!empty($product))
    <div class="container mb-3 detail">
        <form action="{{route('mua-hang')}}" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tất cả <input type="checkbox" id="checkboxMain" value=""></th>
                        <th scope="col"></th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col"></th>
                        <th scope="col">Giá</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
            </table>
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

                <div class="buttons_added col-2 m-auto">
    
                    <div class="plus is-form d-qty">
                        <a class="text-decoration-none text-light m-auto" href="{{route('giam',$key->id)}}">-</a>
                    </div>
    
                    <input class="input-qty" max="10" min="{{$key->quantity}} "type="" class="quantity" id="quantity" value="{{$key->quantity}}"/>
                    
                     <div class="plus is-form d-qty" >
                        <a class="text-decoration-none text-light m-auto" href="{{route('tang',$key->id)}}">+</a>
                    </div>
                
                </div>

                <div class="col-1 m-auto">{{$key->price * $key->quantity}}</div>

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
            display: flex;
            width:30px;
            height: 25px;
            border: 1px black solid;
            margin: 2px;
            justify-content: center;
        }
        .input-qty{
            width:50px;
            height: 27px;
            
        }
        .buttons_added{
            display: flex;
        }
        .mua-hang{
            margin-bottom: 100px;
            float: right;
        }
        .detail{
            height: 500px;
        }
    </style>
@endsection