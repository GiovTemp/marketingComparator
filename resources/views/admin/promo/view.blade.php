@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Dettagli Promo</h6>
              </div>
            </div>
            <div class="card-body">                
                <label for="title">Nome : {{ $promo->title }}</label> 
                <br><br>
                <label for="description">Descrizione Promo : {{ $promo->description }}</label>
                <br><br>
                <label for="score">Score Promo : {{ $promo->score }}</label>
                <br><br>   
                <label for="price">Prezzo Promo : {{ $promo->price }}</label>
                <br><br>   
                <img src="{{asset('images/').'/'.$promo->image}}">
                <br><br>      
            </div>
          </div>
        </div>
      </div>

    </div


@endsection









