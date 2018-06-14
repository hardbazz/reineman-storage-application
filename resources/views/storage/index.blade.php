@extends('app')

@section('content')

    <h1 class="my-4 text-center text-lg-left">Stalling</h1>

    <div class="row text-center text-lg-left">

        @for ( $i = 1; $i <= 50; $i++ )

        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                {{--<img class="img-fluid img-thumbnail" src="{{ URL::asset('img/available.png') }}" alt="">--}}

                <div class="spot" style="text-align: center;">
                    <span style="color: #fff; margin-top: 15px; font-size: 20px;">Vrij</span>
                </div>

            </a>
        </div>

        @endfor

    </div>

@stop