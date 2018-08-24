@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1>Bewerk klant</h1>

    {!! Form::open(['method' => 'PATCH', 'url' => 'clients/edit/' . $clients->cid]) !!}

    {!! Form::hidden('cid', $clients->cid, '') !!}

    <div class="form-group">
        {!! Form::label('firstname', 'Voornaam') !!}
        {!! Form::text('firstname', old('firstname', $clients->firstname), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lastname', 'Achternaam') !!}
        {!! Form::text('lastname', old('lastname', $clients->lastname), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('street', 'Straat') !!}
        {!! Form::text('street', old('street', $clients->street), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('housenumber', 'Huisnummer') !!}
        {!! Form::text('housenumber', old('housenumber', $clients->housenumber), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('zipcode', 'Postcode') !!}
        {!! Form::text('zipcode', old('zipcode', $clients->zipcode), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'Plaats') !!}
        {!! Form::text('city', old('city', $clients->city), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone', 'Telefoon') !!}
        {!! Form::text('phone', old('phone', $clients->phone), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::email('email', old('email', $clients->email), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('bid', 'Boot') !!}

        <select name="bid" class="form-control">
            <option value="0">-</option>
            @foreach($boats as $boat)
                <option value="{{ $boat->bid }}"
                @if($clients->bid == $boat->bid) {{ "selected" }} @endif
                @foreach($bid as $bids)
                    @if($boat->bid == $bids->bid) {{ "disabled style=color:red;" }} @endif
                @endforeach
                > {{ ucfirst($boat->name) . ' ' . $boat->model }} </option>
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