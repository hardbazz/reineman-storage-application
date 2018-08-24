@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

        @if(!empty($boat))

        <h2>Klant: {{ ucfirst($boat->firstname) }} {{ ucfirst($boat->lastname) }}</h2>

        <table class="table table-striped">
            <tr>
                <th>Adres</th>
                <td>{{ ucfirst($boat->street) }} {{ $boat->housenumber }}</td>
            </tr>
            <tr>
                <th>Postcode</th>
                <td>{{ $boat->zipcode }}</td>
            </tr>
            <tr>
                <th>Plaats</th>
                <td>{{ $boat->city }}</td>
            </tr>
            <tr>
                <th>Telefoon</th>
                <td><a href="tel:{{ $boat->phone }}">{{ $boat->phone }}</a></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><a href="mailto:{{ $boat->email }}">{{ $boat->email }}</a></td>
            </tr>
            <tr>
                <th></th>
                <td></td>
            </tr>
            <tr>
                <th>Boot</th>
                <td><a href="/client/{{ $boat->cid }}">{{ $boat->name . ' ' . $boat->model }}</a></td>
            </tr>
        </table>

        <a href="/boats" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

        @else

        <h1>Voeg eerst een boot toe</h1>

        <a href="/clients" class="btn btn-primary"><i class="fa fa-angle-left"></i> Koppel een boot</a>

        @endif

    @endauth

@stop