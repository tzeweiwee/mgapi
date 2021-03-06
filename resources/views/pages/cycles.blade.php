@extends('layouts.app')

@section('content')
    <h1>Total Cycles</h1>
    @if(count($cycles)>0)
        @foreach($cycles as $cycle)
            <div class="well">
                <p>
                    Total cycles: {{$cycle}}
                </p>
                {{-- <p>
                    Total cycles: {{$cycle->number_of_cycle}}
                </p> --}}
            </div>
        @endforeach
    @else 
        <p>No cycles found</p>
    @endif
@endsection