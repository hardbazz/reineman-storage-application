@extends('app')

@section('content')

    @guest
        <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    @if(!empty($client))

    <h2>Boot van {{ ucfirst($client->firstname) }} {{ ucfirst($client->lastname) }}</h2>

    <table class="table table-striped">
        <tr>
            <th>Boot</th>
            <td>{{ ucfirst($client->name) }} {{ $client->model }}</td>
        </tr>
        <tr>
            <th>Lengte</th>
            <td>{{ $client->length }} meter</td>
        </tr>
        <tr>
            <th>Breedte</th>
            <td>{{ $client->width }} meter</td>
        </tr>
        <tr>
            <th>Plaats</th>
            {{--<td>{{ ucfirst($client->spot) }}</td>--}}
        </tr>
    </table>

    <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @else

        <h1>Voeg eerst een boot toe</h1>

        <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Koppel een boot</a>

    @endif

    @endauth

@stop