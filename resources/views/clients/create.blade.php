@extends('app')

@section('content')

    <h1>Klant toevoegen</h1>

    {!! Form::open(['url' => 'clients']) !!}

        <div class="form-group">
            {!! Form::label('firstname', 'Voornaam') !!}
            {!! Form::text('firstname', old('firstname', $clients->firstname), array('class' => 'form-control')) !!}
        </div>

    {!! Form::close() !!}

@stop