@extends('layouts.app')

@section('content')
    <h1>Total Placements In System</h1>
    @if(count($placements)>0)
            <div class="well">
                <p>
                    Total placements: {{$placements}}
                </p>
                {{-- <p>
                    Total cycles: {{$cycle->number_of_cycle}}
                </p> --}}
            </div>
    @else 
        <p>No placements found</p>
    @endif
@endsection