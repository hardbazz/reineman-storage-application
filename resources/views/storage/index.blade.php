@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1 class="my-4 text-center">Stalling</h1>

    <div class="row text-center text-lg-left">

        @foreach ($storage as $spot)
        <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="/storage/{{ $spot->sid }}/add" class="d-block mb-4 h-100">
                <div class="spot @if($spot->bid == "0") free @else taken @endif">
                    <span>{{ $spot->spot }}</span>
                    <input type="hidden" id="hidden_cid" class="hidden_cid" value="{{ $spot->cid }}">
                </div>
            </a>
        </div>
        @endforeach

    </div>

    @endauth

@stop