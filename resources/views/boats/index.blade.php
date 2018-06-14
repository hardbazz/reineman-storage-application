@extends('app')

@section('content')

    <h1>Boten</h1>

    @foreach($boats as $boat)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Boot</th>
            <th scope="col">Model</th>
            <th scope="col">Lengte</th>
            <th scope="col">Width</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{ ucfirst($boat->name) }}</td>
            <td>{{ $boat->model }}</td>
            <td>{{ $boat->length }} meter</td>
            <td>{{ $boat->width }} meter</td>
        </tr>
        </tbody>
    </table>
    @endforeach

@stop