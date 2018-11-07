@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-sm-6">
			<form action="{{route('register')}}" method="POST" class="form-group">
				@csrf
				<label for="inputUserName">Username</label>
				<input type="text" name="name" class="form-control"><br>

				<label for="inputUserName">Password</label>
				<input type="password" name="password" class="form-control"><br>
				
				<label for="inputUserName">Email</label>
				<input type="email" name="email" class="form-control"><br>
				<input type="submit" value="Đăng ký" class="btn btn-success">
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			</form>
		</div>
	</div>
</div>
@endsection