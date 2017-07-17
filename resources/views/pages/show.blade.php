@extends('layouts.app')

@section('content')
    <a href="/users" class="btn btn-default">Go Back</a>
    <h1>{{$user->username}}</h1>
   
    <div>
        {{$user->status}}
    </div>
    <hr>
    <small>Written on {{$user->created_at}}</small>
@endsection