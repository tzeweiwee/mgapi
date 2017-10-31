@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="header" style="text-align:center">
            <h2>User Removal</h2>
            <h2> {{ $function }} </h2>
        </div>
        
        <form>
            <div class="form-group">
                <label for="ic">IC</label>
                <input type="text" class="form-control" id="ic" placeholder="999999145555">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
@endsection
