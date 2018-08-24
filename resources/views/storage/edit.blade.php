@extends('app')

@section('content')

    @guest
        @include('login')
    @endguest

    @auth

    <h1>Bewerk plaats</h1>

    {!! Form::open(['method' => 'PATCH', 'url' => 'storage/edit/' . $storage->sid]) !!}

    {!! Form::hidden('sid', $storage->sid, '') !!}
    {!! Form::hidden('bid', $boats[0]->bid, '') !!}
    {!! Form::hidden('spot', $storage->spot, '') !!}

    <div class="form-group">
        {!! Form::label('bid', 'Boot') !!}

        <select name="bid" class="form-control">
            <option value="">-</option>
            @foreach($boats as $boat)
                <option value="{{ $boat->bid }}" @if($boat->bid == $storage->bid) {{ "disabled" }} @endif>
                    {{ ucfirst($boat->name) . ' ' . ucfirst($boat->model) }}
                </option>
            @endforeach
        </select>

    </div>


    {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}

    {!! Form::close() !!}

    @endauth

@stop