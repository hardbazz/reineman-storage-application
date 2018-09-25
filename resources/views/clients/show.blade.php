@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    @if(!empty($client))

    <h2>Boot van {{ ucfirst($client[0]->firstname) }} {{ ucfirst($client[0]->lastname) }}</h2>

    {{--<table class="table table-striped">--}}
        {{--<tr>--}}
            {{--<th>Boot</th>--}}
            {{--<td>{{ ucfirst($client->name) }} {{ $client->model }}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th>Lengte</th>--}}
            {{--<td>{{ $client->length }} meter</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th>Breedte</th>--}}
            {{--<td>{{ $client->width }} meter</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th>Info boot</th>--}}
            {{--<td><a href="/boats/{{ $client->bid }}">Klik hier</a></td>--}}
        {{--</tr>--}}
    {{--</table>--}}

    @foreach($client as $clients)
        <table class="table table-striped">
            <tr>
                <th class="th_boot">Boot</th>
                <td>{{ ucfirst($clients->name) }} {{ $clients->model }}</td>
            </tr>
            <tr>
                <th>Lengte</th>
                <td>{{ $clients->length }} meter</td>
            </tr>
            <tr>
                <th>Breedte</th>
                <td>{{ $clients->width }} meter</td>
            </tr>
        </table>
    @endforeach

    <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @else

        <h1>Voeg eerst een boot toe</h1>

        <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Koppel een boot</a>

    @endif

    @endauth

@stop