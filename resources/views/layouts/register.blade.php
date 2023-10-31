@extends('layouts.client')
@section('content')
@if($errors->any())
    <x-alert/> 
@endif
    <div class="container border-1 login-bg">
		<div class="login-group">
			<form action="" method="post">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="text-center">Đăng ký</h2>
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
						<button class="btn btn-success mt-3" type='submit'>Register</button>
					</div>
				</div>
				</form>
				<div class="login-bottom">
					Bạn đã có tài khoản ? <a href="{{route('login')}}" target="_blank" rel="noopener noreferrer">Đăng nhập</a>
				</div>
		</div>
	</div>
@endsection