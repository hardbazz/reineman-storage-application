@extends('app')

@section('content')

    @guest
    <h2>Eerst even inloggen</h2>
    @endguest

    @auth

    <h1>Boot plaatsen op {{ ucfirst($storage[0]->spot) }}</h1>

    {!! Form::open(['method' => 'PATCH', 'url' => 'updateStorage/edit/' . $storage[0]->sid]) !!}

    {!! Form::hidden('sid', $storage[0]->sid, '') !!}
    {{--{!! Form::hidden('bid', $storage[0]->sid, '') !!}--}}

    <div class="form-group">
        {!! Form::label('bid', 'Boot') !!}

        <select name="bid" class="form-control">
            <option value="">Kies een boot</option>
            @foreach($boats as $boat)
                <option value="{{ $boat->bid }}" id="
                @foreach($bid as $bids)
                    @if($boat->bid == $bids->bid) {{ $bids->sid }} @endif
                @endforeach"
                @if($boat->bid == $storage[0]->bid) {{ "selected" }} @endif
                @foreach($bid as $bids)
                    @if($boat->bid == $bids->bid) {{ "disabled style=color:red;" }} @endif
                @endforeach
                > {{ ucfirst($boat->name) . ' ' . ucfirst($boat->model) }} </option>
            @endforeach
            <option value="0">- PLAATS VRIJMAKEN -</option>
        </select>

    </div>

    <div class="form-group">
        {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}
        {{--{!! Form::submit( '0', ['class' => 'btn btn-danger', 'name' => 'bid', 'value' => '']) !!}--}}
    </div>

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