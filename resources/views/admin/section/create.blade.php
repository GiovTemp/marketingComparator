@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Crea Sezione</h6>
            </div>
            <div class="card-body p-3">
              <form method="POST" action="/admin/createSection" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary" style="background-color: green;">Crea</button>
                <div class="form-group">
                    <label for="title">Titolo Sezione</label>
                    <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Insersci testo domanda">
                    @error('title')
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


