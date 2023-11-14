@extends('layouts.admin')
@section('content')
    <div class="container row m-auto mt-3">
       <form action="" method="post">
        @if (!empty($product))
        <div class="container-m row mt-1">
            <input type="hidden" name="id" value="{{$product->id}}">
            <label class="form-label col" for="">Tên sản phẩm:</label>
            <input class='form-control col' type="text" name="product_name" value="{{$product->product_name}}">
        </div>
        <div class="container-m row mt-1">
            <label class="form-label col" for="">Giá bán:</label>
            <input class='form-control col' type="text" name="price" value="{{$product->price}}">
        </div>
    
        @foreach ($detail as $item)
            @foreach ($type as $fill => $value)
                @php
                    $fillabe=$value->fillable;
                    $name=$value->name
                @endphp
                @if ($item -> $fillabe != null)
                    <div class="container-m row mt1">
                        <label class="form-label col" for="">{{$name}}</label>
                        <input class='form-control col' type="text" name="{{$fillabe}}" value="{{$item -> $fillabe}}">
                    </div>
                @endif
            @endforeach
        @endforeach
        @csrf
        <button type="submit" class="btn btn-primary mt-4">Sửa</button>
        @endif
       </form>
    </div>
@endsection 
@section('css')
    <style>
        .btn{
            float: right;
        }
    </style>
@endsection