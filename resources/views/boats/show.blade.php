@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

        @if(!empty($boat))

        <h2>Boot: {{ ucfirst($boat->name) }} {{ ucfirst($boat->model) }}</h2>

        <div class="col-md-12">
            <img src="/storage/photo/{{ $boat->photo }}" alt="{{ $boat->name .' '. $boat->model }}">
            <br><br>
        </div>

        <a href="/boats" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

        @else

        <h1>Voeg eerst een boot toe</h1>

        <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Koppel een boot</a>

        @endif

    @endauth

@stop