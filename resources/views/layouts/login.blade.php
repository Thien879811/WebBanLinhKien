@extends('layouts.client')
@section('title')
@endsection
@section('content')
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
        <button type='submit' class="btn">
            Đăng nhập
        </button>
    </form>
@endsection
