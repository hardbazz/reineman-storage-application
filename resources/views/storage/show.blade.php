@extends('app')

@section('content')

    @if (Auth::guest())
        <h2>Eerst even inloggen</h2>
    @else

    <h2>Plek: {{ ucfirst($storage['spot']) }}</h2>

    <table class="table table-striped">
        <tr>
            <th>Klant:</th>
            <td>{!! ucfirst($storage->firstname) !!} {!! $storage->lastname!!}</td>
        </tr>
        <tr>
            <th>Boot</th>
            <td>{!! ucfirst($storage->name) !!} {!! $storage->model !!}</td>
        </tr>
        <tr>
            <th>Lengte</th>
            <td>{!! $storage->length !!} meter</td>
        </tr>
        <tr>
            <th>Breedte</th>
            <td>{!! $storage->width !!} meter</td>
        </tr>
    </table>

    <table class="table table-striped">
        <tr>
            <th>A</th>
            <td>YO!</td>
        </tr>
    </table>

    <a href="/" class="btn btn-primary"><i class="fa fa-angle-left"></i> Ga terug</a>

    @endif

@stop