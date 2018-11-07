@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                    <a href="{{route('book.index')}}">Danh sach book</a><br>
                    <a href="{{route('user.index')}}">Danh sach usser</a><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
