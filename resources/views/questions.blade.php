@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/multi-form.css">
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
  <input type="text" required name="name" placeholder="Nome" />
  <input type="text" required name="surname" placeholder="Cognome" />
  <input type="text" required name="email" placeholder="Email" />
  <input type="text" required name="iva" placeholder="P.IVA" />
  <input type="text" required name="cf" placeholder="CF" />  
</section>


@foreach ($questions as $q)
<section>
<h1>{{$q->title}}</h1>
    <br>
    <h3>{{$q->description}}</h3>
    <hr>
    @foreach (json_decode($q->answers, true) as $a)

    <input type="radio" required value={{ $loop->index }}|{{$a['score']}} name={{$q->id}}> {{$a['text']}}<br>
    
    @endforeach
    
</section>
@endforeach

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

<script src="js/multi-form.js"></script>

@endsection