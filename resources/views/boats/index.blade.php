@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1 class="text-center">Boten</h1>

    <a href="/boats/create" class="btn_new btn btn-success float-left">+ Nieuw</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Boot</th>
            <th scope="col">Model</th>
            <th scope="col">Lengte</th>
            <th scope="col">Breedte</th>
            <th scope="col">Klant</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($boats as $key => $boat)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ ucfirst($boat->name) }}</td>
            <td>{{ $boat->model }}</td>
            <td>{{ $boat->length }} meter</td>
            <td>{{ $boat->width }} meter</td>
            <td><a href="boats/{{ $boat->bid }}"><i class="fa fa-2x fa-info"></i></a></td>
            <td><a href="/boats/{{ $boat->bid }}/edit" class="btn btn-primary">Bewerk</a></td>
            <td>
                {!! Form::open([ 'method'  => 'DELETE', 'url' => 'boats/' . $boat->bid ]) !!}
                {!! Form::submit('Verwijder', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Weet je het zeker?")']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @endauth

@stop