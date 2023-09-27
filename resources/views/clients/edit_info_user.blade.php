
@extends('layouts.client')
@section('title')
    Cập nhật tài khoản
@endsection
@section('content')
@if (session('alert'))
    <div class="alert alert-info">{{session('alert')}}</div>
@endif
@if (!empty($user_data))
    <form action="" method="post">
        <input type="text" name='fullname' value="{{$user_data->fullname}}">
        <br>
        @error('fullname')
        <span style='color: red'>{{$message}}</span>
        @enderror
        <br>
        <input type="text" name='email' value="{{$user_data->email}}">
        <br>
        @error('email')
        <span style='color: red'>{{$message}}</span>
        @enderror
        <br>
        <input type="text" name='address' value="{{$user_data->address}}">
        <br>
        @error('address')
        <span style='color: red'>{{$message}}</span>
        @enderror
        <br>
        <input type="text" name='phone' value="{{$user_data->phone}}">  
        <br>
        @error('phone')
        <span style='color: red'>{{$message}}</span>
        @enderror
        <br>
        @csrf
        <button type="submit" class='mua-hang'>Cập nhật</button>
    </form>
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