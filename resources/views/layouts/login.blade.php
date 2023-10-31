@extends('layouts.client')
@section('title')
@endsection
@section('content')
<div class="login-bg">
    <div class="login-group">
        @if(session('alert'))
        <div class="alert alert-info">
        {{session('alert')}}
        </div>
        @endif
        <div class="login-top">
            <h1>Đăng nhập</h1>
        </div>
        <form action="" class="form-group" method="post">
            <label for="">Email:</label>
            <input type="text" class="form-control" name="email">
            @error('email')
            <span style='color: red'>{{$message}}</span>
            @enderror
            <br>
            <label for="">Mật khẩu:</label>
            <input type="password" class="form-control" name="password">
            @error('password')
            <span style='color: red'>{{$message}}</span>
            @enderror
            <br>
            @csrf
            <button type='submit' class="btn btn-primary ">
                Đăng nhập
            </button>
        </form>
        <div class="login-bottom">
            Bạn chưa có tài khoản ? <a href="{{route('register')}}" target="_blank" rel="noopener noreferrer">Đăng ký</a>
        </div>
    </div>
</div>
@endsection
