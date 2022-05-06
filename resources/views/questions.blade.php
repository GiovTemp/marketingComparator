@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="../css/multi-form.css">
@endsection

@section('content')

<form name="promo-form" method="POST" action="/getPromo">
@csrf
<div id="svg_wrap"></div>


<section>
<h1>Ottieni adesso l'offerta perfetta!</h1><br>
<p>Rispondi alle seguenti domande e il nostro algoritmo troverà l'offerta <b>su misura per te</b></p>
<hr>
  <p>Informazioni personali</p>
  <input type="hidden" name="id_section" value={{$id}}>
  <input type="text" name="name" placeholder="Nome" />
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
<h1>Ottieni adesso l'offerta perfetta!</h1><br>
<p>Rispondi alle seguenti domande e il nostro algoritmo troverà l'offerta <b>su misura per te</b></p>
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
<script src="../js/multi-form.js"></script>


@endsection