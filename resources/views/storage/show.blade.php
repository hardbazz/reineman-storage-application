@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h2>Plek: {{ ucfirst($storage->spot) }}</h2>

    <table class="table table-striped">
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

    <a href="/" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @endauth

@stop