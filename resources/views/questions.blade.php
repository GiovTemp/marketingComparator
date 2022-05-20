@extends('layouts.app')

@section('content')



<form name="promo-form" method="POST" action="/getPromo">
@csrf
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="width: 100%;margin-top:5%;">
        <div class="card-body">
          <div class="container-fluid">
            <section style="text-align:center">
              <br>
              <h1 class="card-title">Ottieni adesso l'offerta perfetta!</h1>
              <br>
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
                <input type="text" name="surname" required class="form-control" placeholder="Inserisci il tuo cognome" aria-label="Surname" aria-describedby="surname">
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
            </section>
            <!--Domande -->

            @foreach ($questions as $q)
            <br>
            <div class="row">
              <div class="col-lg-4">
                <h5 class="card-title"><b>{{$q->title}}</b></h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$q->description}}</h6>
              </div>

              <div class="col-lg-8">
                @foreach (json_decode($q->answers, true) as $a)
                  <fieldset required={{$q->is_required}}>
                    @if ($q->is_multi==1)
                    <input type="checkbox" value={{ $loop->index }}|{{$a['score']}}|{{$q->price}} name={{$q->id}}> {{$a['text']}}<br>
                    @else
                    <input type="radio" value={{ $loop->index }}|{{$a['score']}}|{{$q->price}} name={{$q->id}}> {{$a['text']}}<br>
                    @endif
                  </fieldset>
                  @endforeach  
              </div>
            </div>
            <hr>


            @endforeach
            <br>
            <div class="form-group">
              <h5 class="card-title"><b>Dettagli richiesta</b></h5>
              <textarea class="form-control" name="details" placeholder="Dettagli" rows="3"></textarea>
            </div>

            <br>
            <div class="form-group">
              <h5 class="card-title"><b>Descrivi quello di cui hai bisogno, aggiungi informazioni utili</b></h5>
              <textarea class="form-control" name="details" placeholder="Informazioni utili" rows="3"></textarea>
            </div>
            <br><br><br>
            <div class="row" style="text-align:center;">
              <div class="col-lg-12">
                <h1>Condizioni Generali</h1>
                  <hr>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-12" style="display: flex;justify-content: center;align-items: center;  ">
              <button type="submit" class="rounded-pill btn-rounded2">Calcola Offerte
                <span><i class="fas fa-arrow-right"></i></span>
              </button>
              </div>
            </div>

          
          </div>



          

        </div>
      </div>
    </div>

  </div>
</div>

</form>

<br><br>


@endsection
