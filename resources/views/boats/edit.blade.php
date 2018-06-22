@extends('app')

@section('content')

    @guest
    <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    <h1>Bewerk {{ $boats[0]->name . ' ' . $boats[0]->model }}</h1>

    {!! Form::open(['method' => 'PATCH', 'url' => 'boats/edit/' . $boats[0]->bid]) !!}

    {!! Form::hidden('bid', $boats[0]->bid, '') !!}
    {{--{!! Form::hidden('sid', $storage[0]->sid, '') !!}--}}

    <div class="form-group">
        {!! Form::label('name', 'Boot') !!}
        {!! Form::text('name', old('name', $boats[0]->name), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('model', 'Model') !!}
        {!! Form::text('model', old('model', $boats[0]->model), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('length', 'Lengte') !!}
        {!! Form::text('length', old('length', $boats[0]->length), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('width', 'Breedte') !!}
        {!! Form::text('width', old('width', $boats[0]->width), array('class' => 'form-control')) !!}
    </div>


    {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}

    {!! Form::close() !!}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @endauth

@stop