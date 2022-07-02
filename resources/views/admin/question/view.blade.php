

@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Dettagli Domanda</h6>
              </div>
            </div>
            <div class="card-body">                
               
                Testo domanda : {{ $question->title }}
                <br><br>
                Descrizione Domanda : {{ $question->description }}
                <br><br>   
                <div class="container1">
                    Lista risposte
                <hr>
                @foreach ($answers as $a)
                    <div>Testo : {{$a->text}}</div>
                    <hr>
                @endforeach

            </div>
          </div>
        </div>
      </div>

    </div


@endsection











</div>







