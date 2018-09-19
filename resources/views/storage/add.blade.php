@extends('app')

@section('content')

    @guest
        @include('login')
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
            @foreach($boats as $boat) <!-- Deze foreach loopt door alle boten -->
                <option value="{{ $boat->bid }}" id="
                @foreach($bid as $bids) {{-- Deze foreach loopt door de IDs van de boten en zoekt de stalling ID die daarbij hoort --}}
                    @if($boat->bid == $bids->bid) {{ $bids->sid }} @endif
                @endforeach"
                @if($boat->bid == $storage[0]->bid) {{ "selected" }} @endif
                @foreach($bid as $bids) {{-- Deze foreach loopt door de IDs van de boten en zoekt de boten die al zijn ingedeeld --}}
                    @if($boat->bid == $bids->bid) {{ "disabled style=color:red;" }} @endif
                @endforeach
                > {{ ucfirst($boat->name) . ' ' . ucfirst($boat->model) }} </option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        {!! Form::submit('Opslaan', array('class' => 'btn btn-success')) !!}
        <button href="{{ action('StorageController@addStorage', $storage[0]->sid) }}" type="submit" value="0" name="bid" onclick="return confirm('Weet je het zeker?')" class="btn btn-danger float-right">Boot wissen</button>
    </div>

    {!! Form::close() !!}

    <div class="form-group">
        <a href="/" class="btn btn-primary">< Terug</a>
    </div>

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