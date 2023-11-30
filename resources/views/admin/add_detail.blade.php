@extends('layouts.admin')
@section('title')
    Thêm chi tiết
@endsection
@section('content')
    <div class="container m-auto">
        @if(!empty($fill) && !empty($id_product))
        <form action="{{route("admin.adddetail")}}" method="post">

            <input type="hidden" name="product_id" value="{{$id_product}}">
           
            @foreach ($fill as $item)
               <div class="mt-3 row form-group">
                    <label class="form-label col" for="">{{$item->name}}: </label>
                    <input class='form-control col' type="text" name='{{$item->fillable}}'>
               </div>
            @endforeach
            @csrf
            <button type="submit" class="btn btn-primary mt-4">Thêm</button>
        </form>
    @endif
    </div>
@endsection
@section('css')
    <style>
        .btn{
            float: right;
        }
    </style>
@endsection
