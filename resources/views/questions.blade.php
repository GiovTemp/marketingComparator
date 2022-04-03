@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/multi-form.css">
@endsection

@section('content')

<form name="promo-form" method="POST" action="/getPromo">
@csrf
<div id="svg_wrap"></div>

 <h1>Online Application</h1>
<section>
  <p>Personal information</p>
  <input type="text" placeholder="Nome" />
  <input type="text" placeholder="Cognome" />
  <input type="text" placeholder="P.IVA" />
  <input type="text" placeholder="CF" />  
</section>


@foreach ($questions as $q)
<section>
    {{$q->title}}
    <br>
    {{$q->description}}
    <br>
    @foreach (json_decode($q->answers, true) as $a)

    <input type="radio" value= {{ $loop->index }} name={{$q->id}}>{{$a['text']}}<br>
    
    @endforeach
    
</section>
@endforeach

<section>
  <p>General condtitions</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section>

  <div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" onClick="document.forms['promo-form'].submit();" id="submit">Ottieni Preventivo</div>

</form>




@endsection


@section('js')

<script src="js/multi-form.js"></script>

@endsection