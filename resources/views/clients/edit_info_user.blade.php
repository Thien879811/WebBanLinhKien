
@extends('layouts.client')
@section('title')
    Cập nhật tài khoản
@endsection
@section('content')
@if (session('alert'))
    <div class="alert alert-info">{{session('alert')}}</div>
@endif
@if (!empty($user_data))
    <div class="container info">
        <h2 class="">Chỉnh sửa thông tin</h2>
        <form action="" method="post">
            <div class="form-group-info">
                <label for="">Họ và Tên: </label>
                <input class="form-control" type="text" name='fullname' value="{{$user_data->fullname}}">
                <br>
                @error('fullname')
                <span style='color: red'>{{$message}}</span>
                @enderror
                <br>
                <label for="">Email: </label>
                <input class="form-control" type="text" name='email' value="{{$user_data->email}}">
                <br>
                @error('email')
                <span style='color: red'>{{$message}}</span>
                @enderror
                <br>
                <label for="">Địa chỉ: </label>
                <input class="form-control" type="text" name='address' value="{{$user_data->address}}">
                <br>
                @error('address')
                <span style='color: red'>{{$message}}</span>
                @enderror
                <br>
                <label for="">Số điện thoại:</label>
                <input class="form-control" type="text" name='phone' value="{{$user_data->phone}}">  
                <br>
                @error('phone')
                <span style='color: red'>{{$message}}</span>
                @enderror
                <br>
                @csrf
                <button type="submit" class='btn btn-primary btn-update'>Cập nhật</button>
            </div>
        </form>
    </div>
@endif
@endsection
@section('javascript')
    <script src="{{asset('assets/clients/js/cart.js')}}"></script>
@endsection
@section('css')
    <style>
        .form-group-info{
            width: 500px;
            margin: auto;
        }
        .d-qty{
            width:30px;
        }
        .input-qty{
            width:50px
        }
        .btn-update{
            float: right;
        }
        .info h2{
            text-align: center;
        }
    </style>
@endsection