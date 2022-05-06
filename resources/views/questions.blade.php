@extends('layouts.app')

@section('css')
@endsection

@section('content')



<form name="promo-form" method="POST" action="/getPromo">
@csrf
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="width: 100%; text-align:center;margin-top:5%;">
        <div class="card-body">
          <br>
          <h5 class="card-title">Ottieni adesso l'offerta perfetta!</h5>
          <h6 class="card-subtitle mb-2 text-muted">Rispondi alle seguenti domande e il nostro algoritmo troverà l'offerta <b>su misura per te</b></h6>
          <br>
          <!-- Informazioni personali -->
          <h5 class="card-title">Informazioni Personali</h5>
          <br> 
          <input type="hidden" name="id_section" value={{$id}}>
          <div class="input-group mb-3">
            <span class="input-group-text" id="name">Nome</span>
            <input type="text" name="name" required class="form-control" placeholder="Inserisci il tuo nome" aria-label="name" aria-describedby="name">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="surname">Cognome</span>
            <input type="text" name="name" required class="form-control" placeholder="Inserisci il tuo cognome" aria-label="Surname" aria-describedby="surname">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="email">Email</span>
            <input type="text" name="email" required class="form-control" placeholder="Inserisci la tua email" aria-label="Email" aria-describedby="email">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="iva">P.iva</span>
            <input type="text" name="iva" required class="form-control" placeholder="Inserisci la tua partita iva" aria-label="iva" aria-describedby="iva">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="cf">Codice Fiscale</span>
            <input type="text" name="cf" required class="form-control" placeholder="Inserisci il tuo codice fiscale" aria-label="cf" aria-describedby="cf">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="city">Città</span>
            <input class="form-control" list="datalistOptions" name="city" id="city" placeholder="Inserisci la tua città...">
            <datalist id="datalistOptions">
              <option value="Roma">
              <option value="Torino">
              <option value="Milano">
              <option value="Bari">
            </datalist>          
          </div>


        </div>
      </div>
    </div>

  </div>
</div>

<section>
<h1></h1><br>
<p></p>
<hr>
  <p>Informazioni personali</p>

  <input type="text"  placeholder="Nome" />
  <input type="text" name="surname" placeholder="Cognome" />
  <input type="text" name="email" placeholder="Email" />
  <input type="text" name="iva" placeholder="P.IVA" />
  <input type="text" name="cf" placeholder="CF" />  
  <input type="text" name="city" placeholder="Città" /> 
</section>


@foreach ($questions as $q)
<section>
<h1>{{$q->title}}</h1>
    <br>
    <h3>{{$q->description}}</h3>
    <hr>
    @foreach (json_decode($q->answers, true) as $a)

    <input type="radio" value={{ $loop->index }}|{{$a['score']}}|{{$q->price}} name={{$q->id}}> {{$a['text']}}<br>
    
    @endforeach
    
</section>
@endforeach

<section>

<hr>
  <p>Dettagli richiesta</p>
  <textarea  name="details" placeholder="Dettagli" cols="150" ></textarea>

  <hr>
  <p>Descrivi quello di cui hai bisogno, aggiungi informazioni utili</p>
  <textarea  name="info" placeholder="Informazioni utili" cols="150"></textarea>
</section>

<section>
<h1>Condizioni Generali</h1>
<hr>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</section>

<div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" onClick="document.forms['promo-form'].submit();" id="submit">Ottieni Preventivo</div>

</form>

<br><br>


@endsection


@section('js')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

@endsection