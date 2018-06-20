@extends('app')

@section('content')

    @guest
        <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    @if(!empty($storage))

    <h2>Plek: {{ $storage->spot }}</h2>

    <table class="table table-striped">
        <tr>
            <th>Klant:</th>
            <td><a href="/client/{{ $storage->cid }}">{{ ucfirst($storage->firstname) }} {{ $storage->lastname}}</a></td>
        </tr>
        <tr>
            <th>Boot</th>
            <td>{{ ucfirst($storage->name) }} {{ $storage->model }}</td>
        </tr>
        <tr>
            <th>Lengte</th>
            <td>{{ $storage->length }} meter</td>
        </tr>
        <tr>
            <th>Breedte</th>
            <td>{{ $storage->width }} meter</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="/storage/{{ $storage->sid }}/edit" class="btn btn-primary">Bewerk</a>
            </td>
        </tr>
    </table>

    @else

        <h1>Voeg een boot toe</h1>

        <table class="table table-striped">
            <tr>
                <td>
                    <a href="/storage/create" class="btn btn-success">Voeg toe</a>
                </td>
            </tr>
        </table>

    @endif

    <a href="/" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @endauth

@stop