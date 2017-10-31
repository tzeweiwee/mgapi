@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="header" style="text-align:center">
            <h2>User Registration</h2>
        </div>
        
        <form id="registerSection" class="form-horizontal" method="POST" action="{{ route('/auth/register') }}">
            <div class="form-group">
                <label for="ic">IC</label>
                <input type="text" class="form-control" id="ic" name="ic" placeholder="999999145555">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="userType">User Type:</label>
                <select name="user_type" id="userType">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
@endsection
