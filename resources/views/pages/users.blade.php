@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    @if(count($users)>0)
        @foreach($users as $user)
            <div class="well">
                <h3><a href="/users/{{$user->id}}">{{$user->username}}</a></h3>
                <small>Written on {{$user->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No users found</p>
    @endif
@endsection