@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1>Boot toevoegen</h1>

    {!! Form::open(['url' => 'boats', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Boot') !!}
        {!! Form::text('name', old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('model', 'Model') !!}
        {!! Form::text('model', old('model'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('length', 'Lengte') !!}
        {!! Form::text('length', old('length'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('width', 'Breedte') !!}
        {!! Form::text('width', old('width'), array('class' => 'form-control')) !!}
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