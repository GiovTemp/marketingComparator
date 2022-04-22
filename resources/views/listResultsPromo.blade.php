@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:10%;margin-bottom:10%">
    <div class="row">
    @foreach ($promos as $p)
    
<div class="card" style="width: 18rem; margin: 10px; padding:20px;">
  <img src="{{ URL::asset('images') }}/{{$p->image}}" class="card-img-top" alt="...">
  <div class="card-body">
  <form name="estimate-form" method="POST" action="/requestEstimate">
    @csrf
    <h5 class="card-title">{{$p->title}}</h5>
    <input type="hidden" name="id_promo" value={{$p->id}}>
    <input type="hidden" name="result" value={{$results}}>
    <p class="card-text">{{$p->description}}</p>
    <button onClick="document.forms['estimate-form'].submit();" class="btn btn-primary">Richiedi Preventivo</a>
    </form>
  </div>
</div>

@endforeach

    </div>
</div>


@endsection
