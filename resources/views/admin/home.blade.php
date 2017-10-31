@extends('layouts.admin')

@section('content')
    <div class="container">
        Select a function to perform transactions.
        <ul>
        <li><a href="{{ URL::route('registerNewUserForm') }}">Register New User</a></li>
        <li><a href="{{ URL::route('removeUserForm') }}">Remove User</a></li>
        <li><a href="{{ URL::route('viewAllUsers') }}">View All User</a></li>
      </ul>
    </div>
@endsection
