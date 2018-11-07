@extends('layouts.app');

@section('content')

	<div class="container">
		<a href="{{route('user.create')}}"><button type="button" class="btn btn-primary">Add</button></a>
		<table class="table">
		  	<thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Role</th>
		      <th scope="col">Action</th>
		    </tr>
		  	</thead>
		  	<tbody> 	
			@foreach($users as $user)
		    <tr>
		      <th scope="row">{{$user->id}}</th>
		      <td>{{$user->name}}</td>
		      <td>{{$user->email}}</td>
		      <td>{{$user->role}}</td>
		      	<td>
		      		<a href="{{route('user.show', $user->id)}}"> 
		      			<button type="button" class="btn btn-primary">Infor</button>
		      		</a>
		      		<a href="{{route('user.edit', $user->id)}}"> 
		      			<button type="button" class="btn btn-warning">Edit</button>
		      		</a>
		      			@if($user->id !== Auth::id())
		    			<button type="submit" class="btn btn-danger" data-id={{$user->id}} data-toggle="modal" data-target="#delete_user">Delete</button>
		    			@endif
		    	</td>
		    </tr>
		    @endforeach
		    
		  </tbody>
		</table>
	</div>

	<!-- Modal -->
		<div class="modal modal-danger fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      </div>
		      <form action="{{route('user.destroy',$user->id)}}" method="post">
		      		{{method_field('delete')}}
		      		@csrf
			      <div class="modal-body">
						<p class="text-center">
							Are you sure?
						</p>
			      		<input type="hidden" name="id" id="id" value="">

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
			        
			        <button type="submit" class="btn btn-warning">Delete</button>
			        
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
@endsection

	 
