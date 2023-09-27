@extends('layouts.client')
@section('content')
@if($errors->any())
    <x-alert/> 
@endif
    <div class="container border-1">
		<form action="" method="post">
        <div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Registation Form - Input User's Detail Information</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="usr">Name:</label>
					<input name='fullname' required="true" type="text" class="form-control" id="usr">
					@error('fullname')
					<span style='color: red'>{{$message}}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input name='email' required="true" type="email" class="form-control" id="email">
					@error('email')
					<span style='color: red'>{{$message}}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input name='password' required="true" type="password" class="form-control" id="pwd">
					@error('password')
					<span style='color: red'>{{$message}}</span>
					@enderror
				</div>
				<div class="form-group">
				  <label for="confirmation_pwd">Confirmation Password:</label>
				  <input required="true" type="password" class="form-control" id="confirmation_pwd">
				</div>
                @csrf
				<button class="btn btn-success" type='submit'>Register</button>
			</div>
		</div>
        </form>
	</div>
@endsection