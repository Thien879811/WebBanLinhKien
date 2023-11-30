@extends('layouts.admin')
@section('title')
    Doanh thu
@endsection
@section('content')

    <div class="container mt-5">
        <h3>Doanh thu</h3>
        @if(session('alert'))
            <div class="alert alert-info">
            {{session('alert')}}
            </div>
        @endif
        <nav style="width: 600px;float:right;">
            <form action="" method="post">
                <div class=" position-relative search">
                    <div class="align-items-center">
                        <div class="input-group input-group1 mt-2 bg-light">
                            <input name='search' type="search" class="form-control form-control1" placeholder="Nhập từ khóa cần tìm"
                                aria-label="Search" aria-describedby="button-addon2" >
                                @csrf
                            <button type='submit' class="btn btn1 btn-dark" type="button" id="button-addon2" >
                                <a class="text-decoration-none text-light" href="#"><i class="fa fa-search "></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </nav>

        <div>
            @foreach ($soluong as $item)
            <p>Số lượng sản phẩm trong kho: {{$item->count}}</p>
            @endforeach
            
            @foreach ($delivered as $item)
                <p>Số lượng đơn hàng đã giao: {{$item->count}}</p>
            @endforeach
        
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt=1;
                    $tong=0;
                @endphp
                @foreach ($data as $item=> $value)
                <tr>
                    <th scope="row">{{$stt}}</th>
                    <th>{{$value->fullname}}</th>
                        @php
                            $sum=0;
                            $stt=$stt+1
                        @endphp
                    <th>
                        <ul>
                            @foreach ($product as $item => $key)
                            @if ($value->id == $key->order_id)
                                <li>
                                    {{$key->product_name}}
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach ($product as $item => $key)
                            @if ($value->id == $key->order_id)
                                <li>
                                    {{$key->quantity}}
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        <ul>
                            @foreach ($product as $item => $key)
                            @if ($value->id == $key->order_id)
                                <li>
                                    @php
                                    $price = number_format($key->price, 0, ',', '.') . ' vnđ'
                                    @endphp
                                    {{$price}}
                                </li>
                                @php
                                    $sum=$sum+$key->total
                                @endphp
                            @endif
                            @endforeach
                        </ul>
                    </th>
                    <th>
                        @php
                            $tong=$tong+$sum;
                        @endphp
                        {{$sum}}
                    </th>
                    <th>
                        @if ($value->status == 0)
                            <a>Chưa giao</a>
                            <a  class='btn btn-primary' href="{{route('admin.update',$value->id)}}"> Cập nhật</a>
                            <a  class='btn' href="{{route('admin.delete',$value->id)}}">Xóa</a>
                        @else
                            <a>Đã giao</a>
                            <a  class='btn' href="{{route('admin.delete',$value->id)}}">Xóa</a>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <h4>Tổng doanh thu: {{$tong}} vnd</h4>
        </div>
    </div>
@endsection
@section('css')
    <style>
        li{
            list-style: none;
        }
    </style>
@endsection