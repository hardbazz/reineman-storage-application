@extends('app')

@section('content')

    @guest
    <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    <h1>Klant toevoegen</h1>

    {!! Form::open(['url' => 'storage']) !!}

    <div class="form-group">
        {!! Form::label('bid', 'Boot') !!}

        <select name="bid" class="form-control">
            <option value="">-</option>
            @foreach($boats as $boat)
                <option value="{{ $boat->bid }}" @if($boat->bid == $storage[0]->bid) {{ "disabled" }} @endif> {{ ucfirst($boat->name) . ' ' . ucfirst($boat->model) }} </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('sid', 'Plaats') !!}

        <select name="sid" class="form-control">
            <option value="">-</option>
            @foreach($storage as $place)
                <option value="{{ $place->sid }}"> {{ ucfirst($place->spot) }} </option>
            @endforeach
        </select>
    </div>

    {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}

    {!! Form::close() !!}

    @endauth

@stop