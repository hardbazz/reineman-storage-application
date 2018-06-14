@extends('app')

@section('content')

    <h1>Klanten</h1>

    <a href="/clients/create" class="btn btn-success float-left">+ Nieuw</a>

    @foreach($clients as $client)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Straat</th>
                <th scope="col">Postcode</th>
                <th scope="col">Plaats</th>
                <th scope="col">Telefoon</th>
                <th scope="col">E-mail</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $client->firstname . ' ' . $client->lastname }}</td>
                <td>{{ $client->street . ' ' . $client->housenumber }}</td>
                <td>{{ $client->zipcode }}</td>
                <td>{{ $client->city }}</td>
                <td><a href="tel:{{ $client->phone }}">{{ $client->phone }}</a></td>
                <td><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></td>
            </tr>
            </tbody>
        </table>
    @endforeach

@stop