@extends('app')

@section('content')

    @guest
    <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    <h1>Boot plaatsen op {{ ucfirst($storage[0]->spot) }}</h1>

    {!! Form::open(['method' => 'PATCH', 'url' => 'updateStorage/edit/' . $storage[0]->sid]) !!}

    {!! Form::hidden('sid', $storage[0]->sid, '') !!}

    <div class="form-group">
        {!! Form::label('bid', 'Boot') !!}

        <select name="bid" class="form-control">
            <option value="">Kies een boot</option>
            @foreach($boats as $boat)
                <option value="{{ $boat->bid }}" @if($boat->bid == $storage[0]->bid) {{ "selected" }} @endif> {{ ucfirst($boat->name) . ' ' . ucfirst($boat->model) }} </option>
            @endforeach
        </select>
    </div>

    @if(empty($storage[0]->bid))
    <div class="form-group">
        {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}
    </div>
    @else
        <div class="form-group">
            {!! Form::open([ 'controller'  => 'clearStorage@StorageController', 'url' => 'storage/' . $storage[0]->sid ]) !!}
            {!! Form::submit('Plaats vrijmaken', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    @endif

    {!! Form::close() !!}

    @endauth

@stop