@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-sm-6">
			<br>
			<form action="{{route('login')}}" method="POST" class="form-group">
				@csrf
				<div class="form-group">
					<label for="inputUserName">Username</label>
					<input class="form-control" type="text" name="name">
				</div>
				<div lass="form-group">
					<label for="inputPassword">Password</label>
					<input class="form-control" type="password" name="password"><br>
				</div>
				<input class="btn btn-primary" type="submit" value="Login">


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