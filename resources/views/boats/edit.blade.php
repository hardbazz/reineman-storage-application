@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1>Bewerk {{ $boats[0]->name . ' ' . $boats[0]->model }}</h1>

    {!! Form::open(['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'url' => 'boats/edit/' . $boats[0]->bid]) !!}

    {!! Form::hidden('bid', $boats[0]->bid, '') !!}

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

    <div class="form-group">
        {!! Form::label('photo', 'Foto') !!}
        {!! Form::file('photo') !!}
    </div>

    <div class="form-group">
        {!! Form::label('cid', 'Klant') !!}

        <select name="cid" class="form-control">
            <option value="0">-</option>
            @foreach($clients as $client)
                <option value="{{ $client->cid }}"
                @if($boats[0]->cid == $client->cid) {{ "selected" }} @endif
                > {{ ucfirst($client->firstname) . ' ' . $client->lastname }} </option>
            @endforeach
        </select>

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