@extends('app')

@section('content')

    @guest
    <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    <h1>Boot plaatsen op {{ ucfirst($storage[0]->spot) }}</h1>

    {!! Form::open(['method' => 'PATCH', 'url' => 'updateStorage/edit/' . $storage[0]->sid]) !!}

    {{csrf_field()}}
    {{ method_field('PATCH') }}

    {!! Form::hidden('sid', $storage[0]->sid, '') !!}

    <div class="form-group">
        {!! Form::label('bid', 'Boot') !!}

        <select name="bid" class="form-control">
            <option value="">-</option>
            @foreach($boats as $boat)
                <option value="{{ $boat->bid }}" @if($boat->bid == $storage[0]->bid) {{ "disabled" }} @endif> {{ ucfirst($boat->name) . ' ' . ucfirst($boat->model) }} </option>
            @endforeach
            <option value="">- Verwijder boot</option>
        </select>
    </div>

    {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}

    {!! Form::close() !!}

    @endauth

@stop