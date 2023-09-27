
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
    <div>Trang chi tiết</div>
@endsection
@section('css')
    <style>
    </style>
@endsection