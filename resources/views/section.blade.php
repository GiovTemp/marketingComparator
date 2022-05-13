@extends('layouts.app')

@section('content')

<div class="container" style="text-align:center;">

    <div class="row" style="margin-top:3vh;margin-bottom:3vh;">
        <div class="col-lg-12">
            <h2>Seleziona il tipo di promozione che desideri</h2><br>
            <h4>Compila il questionario e troveremo le migliori offerte per te</h4>
        </div>
    </div>

    <div class="row" style="margin-top:10vh;margin-bottom:10vh;">
        <div class="col-lg-12">
            <div class="container" style="display: flex;justify-content: center;align-items: center;">
                @foreach ($sections as $s)

                <div class="row" style="margin-top:5vh;margin-bottom:5vh;">
                    <div class="col-lg-12">
                        <a href="{{route('questions',[$s->id])}}" style="text-decoration:none;">
                            <button type="button" class="rounded-pill btn-rounded2">{{$s->title}}
                                <span><i class="fas fa-arrow-right"></i></span>
                            </button>
                        </a>
                    </div>
                </div>

                @endforeach        
            </div>
        </div>
    </div>


</div>



@endsection