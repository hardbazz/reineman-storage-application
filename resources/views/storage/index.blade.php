@extends('app')

@section('content')

    @if (Auth::guest())
        <h2>Eerst even inloggen</h2>
    @else

    <h1 class="my-4 text-center text-lg-left">Stalling</h1>

    <div class="row text-center text-lg-left">

        {{--@for ( $i = 1; $i <= 50; $i++ )--}}

        @foreach ($storage as $spot)
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <div class="spot">
                        <span>{{ $spot->spot }}</span>
                </div>
            </a>
        </div>
        @endforeach

        {{--@endfor--}}

    </div>

    @endif

@stop