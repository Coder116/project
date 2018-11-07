{{-- @extends('layouts.app');

@section('content') --}}

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
		
  	{{-- <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
  		{{ method_field('PUT') }}
  	@csrf --}}
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Title</label>
	      	<div class="col-sm-10">
	        	<input type="text" {{-- value="{{$book->title}}" --}} class="form-control" id="title" placeholder="Enter title" name="title">
	      	</div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Description</label>
	      	<div class="col-sm-10">          
	       		 <input type="text" {{-- value="{{$book->description}}" --}} class="form-control" id="description" placeholder="Enter description" name="description">
	     	 </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Fmd</label>
	      	<div class="col-sm-3">          	
	       		 <input type="date" id="fmd" name="fmd">
	     	 </div>
	    </div>

	    <div class="form-group">
	         
			  <input type='file' id="imgInp" name="imgInp"/>
			  <img id="blah" src="{{url('/images/'.$b->image)}}" alt="your image" width="100px" />
			
        </div>
	     

				
</div>
{{-- @endsection --}}