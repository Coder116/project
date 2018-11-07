@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">User profile<hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
            </div>
            
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin">{{$user->name}}</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> {{$user->email}}<br>
                </div>
              </div>
            </div>
           
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr>
              <a href="{{route('user.edit', $user->id)}}"><button class="btn btn-default pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit</button></a>
              <a href="{{route('book.index')}}"><button class="btn btn-default pull-right"><i class="glyphicon glyphicon-pencil"></i> Book</button></a>
              <a href="{{ url()->previous() }}" class="btn btn-default pull-right">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection