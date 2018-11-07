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
  	<form class="form-horizontal" action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
  	@csrf
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Title</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="email" placeholder="Enter title" name="title" value="{{old('title')}}">
	      	</div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Description</label>
	      	<div class="col-sm-10">          
	       		 <input type="text" class="form-control" id="pwd" placeholder="Enter description" name="description" value="{{old('description')}}">
	     	 </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Fmd</label>
	      	<div class="col-sm-3">          	
	       		 <input type="date" class="form-control" id="pwd" name="fmd" value="{{old('fmd')}}">
	     	 </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Image</label>
	      	<div class="col-sm-10">          	
	       		 <input type="file" class="form-control" id="pwd" name="image">
	     	 </div>
	     </div>
	    <button type="submit" class="btn btn-primary">Add</button>
	</form>

				
</div>
@endsection