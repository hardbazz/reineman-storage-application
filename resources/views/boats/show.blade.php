@extends('app')

@section('content')

    @if (Auth::guest())
        <h2>Eerst even inloggen</h2>
    @else

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
        </table>

        <a href="/boats" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @endif

@stop