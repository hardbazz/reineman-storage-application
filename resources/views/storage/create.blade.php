@extends('app')

@section('content')

    <h1>Plek toekennen</h1>

    {!! Form::open(['url' => 'storage']) !!}

    <div class="form-group">
        {!! Form::label('cid', 'Klant') !!}

        <select name="cid" class="form-control">
            <option value="">-</option>
            @foreach($clients as $client)
                <option value="{{ $client->cid }}" @if($client->cid == $storage->cid) {{ "selected" }} @endif> {{ ucfirst($client->firstname) . ' ' . ucfirst($client->lastname) }} </option>
            @endforeach
        </select>

    </div>

    {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}

    {!! Form::close() !!}

@stop