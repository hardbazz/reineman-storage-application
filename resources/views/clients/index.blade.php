@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1 class="text-center">Klanten</h1>

    <a href="/clients/create" class="btn_new btn btn-success float-left">+ Nieuw</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col" class="hidden-mobile">Straat</th>
                <th scope="col" class="hidden-mobile">Postcode</th>
                <th scope="col" class="hidden-mobile">Plaats</th>
                <th scope="col">Telefoon</th>
                <th scope="col">E-mail</th>
                <th scope="col">Boot</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $key => $client)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $client->firstname . ' ' . $client->lastname }}</td>
                <td class="hidden-mobile">{{ $client->street . ' ' . $client->housenumber }}</td>
                <td class="hidden-mobile">{{ $client->zipcode }}</td>
                <td class="hidden-mobile">{{ $client->city }}</td>
                <td><a href="tel:{{ $client->phone }}">{{ $client->phone }}</a></td>
                <td><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></td>
                <td><a href="client/{{ $client->cid }}"><i class="fa fa-2x fa-info"></i></a></td>
                <td><a href="/clients/{{ $client->cid }}/edit" class="btn btn-primary">Bewerk</a></td>
                <td>
                    {!! Form::open([ 'method'  => 'DELETE', 'url' => 'clients/' . $client->cid ]) !!}
                    {!! Form::submit('Verwijder', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Weet je het zeker?")']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    @endauth

@stop