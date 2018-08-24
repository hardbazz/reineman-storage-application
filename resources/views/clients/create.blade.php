@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1>Klant toevoegen</h1>

    {!! Form::open(['url' => 'clients']) !!}

    <div class="form-group">
        {!! Form::label('firstname', 'Voornaam') !!}
        {!! Form::text('firstname', old('firstname', $clients[0]->firstname), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lastname', 'Achternaam') !!}
        {!! Form::text('lastname', old('lastname', $clients[0]->lastname), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('street', 'Straat') !!}
        {!! Form::text('street', old('street', $clients[0]->street), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('housenumber', 'Huisnummer') !!}
        {!! Form::text('housenumber', old('housenumber', $clients[0]->housenumber), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('zipcode', 'Postcode') !!}
        {!! Form::text('zipcode', old('zipcode', $clients[0]->zipcode), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'Plaats') !!}
        {!! Form::text('city', old('city', $clients[0]->city), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone', 'Telefoon') !!}
        {!! Form::text('phone', old('phone', $clients[0]->phone), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::email('email', old('email', $clients[0]->email), array('class' => 'form-control')) !!}
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