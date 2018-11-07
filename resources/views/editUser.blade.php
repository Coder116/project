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
		
  	<form class="form-horizontal" action="{{route('user.update', $users->id)}}" method="POST" enctype="multipart/form-data">
  		{{ method_field('PUT') }}
  	@csrf
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Name</label>
	      	<div class="col-sm-10">
	        	<input type="text" value="{{$users->name}}" class="form-control" id="name" name="name">
	      	</div>
	    </div>
	    <div class="form-group">
	    	<label class="control-label col-sm-2" for="pwd">New Password</label>
	      		<div class="col-sm-10">          
	       			 <input type="password" class="form-control" id="pwd" name="password" >
	     	 	</div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Email</label>
	      	<div class="col-sm-10">          	
	       		 <input type="email" value="{{$users->email}}" class="form-control" id="pwd" name="email" >
	     	 </div>
	    </div>
	    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">Edit</button>
	    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

	</form>

				
</div>
@endsection