@extends('app')

@section('content')

    @if (Auth::guest())
        <h2>Eerst even inloggen</h2>
    @else

        <h2>Klant: {!! ucfirst($boats->firstname) !!} {!! ucfirst($boats->lastname) !!}</h2>

        <table class="table table-striped">
            <tr>
                <th>Adres</th>
                <td>{!! ucfirst($boats->street) !!} {!! $boats->housenumber !!}</td>
            </tr>
            <tr>
                <th>Postcode</th>
                <td>{!! $boats->zipcode !!}</td>
            </tr>
            <tr>
                <th>Plaats</th>
                <td>{!! $boats->city !!}</td>
            </tr>
            <tr>
                <th>Telefoon</th>
                <td><a href="tel:{{ $boats->phone }}">{!! $boats->phone !!}</a></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><a href="mailto:{{ $boats->email }}">{!! $boats->email !!}</a></td>
            </tr>
        </table>

        <a href="/boats" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @endif

@stop