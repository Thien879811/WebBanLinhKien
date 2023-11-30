@extends('layouts.admin')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
<div class="container d-flex justify-conten-center">
   <div class="add-group">
    @if (!empty($loai))
    <h2>Thông tin sản phẩm</h2>
        <form action="{{route('admin.addproduct')}}" method="post" enctype="multipart/form-data">
            <div class="mt-3 row">
                <label class="form-label col" for="lang-select">Tên sản phẩm: </label>
                <input class="form-control col" type="text" name='product_name'><br>
            </div>
            <div class="mt-3 row">
                <label class="form-label col" for="lang-select">Giá bán: </label>
                <input class="form-control col" type="text" name='price'><br>
            </div>
            <div class="mt-3 row">
                <label class="form-label col" for="lang-select">Số lượng: </label>
                <input class="form-control col" type="text" name='product_quantity'><br>
            </div>
            <div class="mt-3 row">
                <label class="form-label col" for="lang-select">Hình ảnh minh họa: </label>
                <input class="form-control col" type="file" name="image" accept="image/*">
            </div>
            <br>
            <div class="mt-3 row">
                <label class="form-label col" for="lang-select">Chọn sản phẩm cần thêm: </label>
                <select class="form-select col" name="product_type" id="lang-select">
                    @foreach ($loai as $item)
                    <option name="type_id" value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            @csrf
            <button type="submit" class='btn btn-primary mt-3'>Thêm chi tiết</button>
        </form>
    @endif
   </div>
</div>
@endsection
<style>
    .btn{
        float: right;
    }
</style>
