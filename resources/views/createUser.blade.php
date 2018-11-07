@extends('layouts.app');

@section('content')
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
	
	<div class="container">
  	<form class="form-horizontal" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
  	@csrf
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Name</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" value="{{old('name')}}">
	      	</div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Password</label>
	      	<div class="col-sm-10">          
	       		 <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="password" value="{{old('password')}}">
	     	 </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Email</label>
	      	<div class="col-sm-10">          	
	       		 <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{old('email')}}">
	     	 </div>
	    </div>
	    
	    <button type="submit" class="btn btn-primary">Add</button>
	</form>

				
</div>
@endsection