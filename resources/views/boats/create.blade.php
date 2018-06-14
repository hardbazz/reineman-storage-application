@extends('app')

@section('content')

    <h1>Klant toevoegen</h1>

    {!! Form::open(['url' => 'boats']) !!}

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

@stop