@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Crea Offerta</h6>
            </div>
            <div class="card-body p-3">
              <form method="POST" action="/admin/createPromo" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary" style="background-color: green;">Crea</button>
                <div class="form-group">
                    <label for="title">Nome Promo</label>
                    <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Insersci testo domanda">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descrizone Promo</label>
                    <input class="form-control @error('description') is-invalid @enderror" id="description" type="text" name="description" placeholder="Inserisci descrizione">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="score">Score Offerta</label>
                    <input class="form-control @error('score') is-invalid @enderror" id="score" type="text" name="score" placeholder="Inserisci descrizione">
                    @error('score')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input class="form-control @error('price') is-invalid @enderror" id="price" type="text" name="price" placeholder="Inserisci descrizione">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Immagine Promo</label>
                    <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" placeholder="Inserisci descrizione">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Messaggio promozionale</label>
                    <input class="form-control @error('promoMessage') is-invalid @enderror" id="promoMessage" type="text" name="promoMessage" placeholder="Inserisci descrizione">
                    @error('promoMessage')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
           
                    
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection


