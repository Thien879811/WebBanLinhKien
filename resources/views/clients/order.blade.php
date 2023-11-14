
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
    @if(!empty($data_order))
        <div class="status">
            <h4>Đang chờ vận chuyển</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tất cả <input type="checkbox" id="checkboxMain" value=""></th>
                    <th scope="col"></th>
                    <th scope="col-2">Sản phẩm</th>
                    <th scope="col"></th>
                    <th scope="col">Giá</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
        </table>
        @foreach($data_order as $key => $value)
                @php
                    $temp=1
                @endphp
                @if ($value->status == 0)
                    <div class="d-flex container row border-1 bg-info mt-2">
                        <div class="col-1 m-auto ">
                            <img src="{{asset('images')}}/{{$value->images}}" alt="" sizes="" srcset="" class="img-thumbnail">
                        </div>
                        <div class="col-2 m-auto">{{$value->product_name}}</div>
                        <div class="col-1 m-auto">{{$value->price }}</div>
                        <div class="col-1 m-auto">{{$value->quantity }}</div>
                        <div class="col-1 m-auto">{{ $value->total}}</div>
                    </div>
                @else
                    @php
                        $temp=0
                    @endphp 
                @endif
        @endforeach
        @if ($temp=0)
            <div>Không có đơn hàng đang chờ vận chuyển</div>
        @endif
        <div class="status">
            <h4>Đã giao hàng</h4>
        </div>
        @foreach($data_order as $key => $value)
                @php
                    $temp=1
                @endphp
                @if ($value->status == 1)
                    <div class="d-flex container row border-1 bg-info mt-2">
                        <div class="col-1 m-auto ">
                            <img src="{{asset('images')}}/{{$value->images}}" alt="" sizes="" srcset="" class="img-thumbnail">
                        </div>
                        <div class="col-2 m-auto">{{$value->product_name}}</div>
                        <div class="col-1 m-auto">{{$value->price }}</div>
                        <div class="col-1 m-auto">{{$value->quantity }}</div>
                        <div class="col-1 m-auto">{{ $value->total}}</div>
                    </div>
                @else
                    @php
                        $temp=0
                    @endphp 
                @endif
        @endforeach
        @if ($temp=0)
            <div>Không có đơn hàng</div>
        @endif
    @endif
@endsection
@section('css')
    <style>
        .status h4{
            margin-top:10px;
            float: right;
        }
    </style>
@endsection
