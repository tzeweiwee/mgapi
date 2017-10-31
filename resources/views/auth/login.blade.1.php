@extends('layouts.admin')

@section('content')
<style>
    .loginHeader{
        text-align: center;
    }

    .loginWrapper{
        margin: 40px 0 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #loginSection{
        width: 20%;
    }

    .submitButton{
        float: right;
    }

    @media only screen and (max-width: 500px) {
        #loginSection {
            width: 80%;
        }
    }

</style>
<div class="container">
    <div class="loginHeader">
        <h3> Admin Login Page </h3>
    </div>
    <div class="loginWrapper">
        <form id="loginSection" class="form-horizontal" method="POST" action="{{ route('/auth/login') }}">
            <div class="form-group">
                <label for="icInput">Enter Admin IC</label>
                <input type="text" class="form-control" id="ic" name="ic" placeholder="IC">
            </div>
            <div class="form-group">
                <label for="passwordInput">Enter Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button class="submitButton" type="submit" class="btn btn-default">Submit</button>
            <input type="hidden" name="user_type" value="admin">
        </form>
    </div>

</div>
@endsection
