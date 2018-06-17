@extends('app')

@section('content')

    @if (Auth::guest())
        <h2>Eerst even inloggen</h2>
    @else

    <h2>Boot van {!! ucfirst($client->firstname) !!} {!! ucfirst($client->lastname) !!}</h2>

    <table class="table table-striped">
        <tr>
            <th>Boot</th>
            <td>{!! ucfirst($client->name) !!} {!! $client->model !!}</td>
        </tr>
        <tr>
            <th>Lengte</th>
            <td>{!! $client->length !!} meter</td>
        </tr>
        <tr>
            <th>Breedte</th>
            <td>{!! $client->width !!} meter</td>
        </tr>
        <tr>
            <th>Plaats</th>
            <td>A1</td>
        </tr>
    </table>

    <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @endif

@stop