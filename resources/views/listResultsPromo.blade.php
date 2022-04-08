@foreach ($promos as $p)
<form name="estimate-form" method="POST" action="/requestEstimate">
@csrf
    {{$p->title}}
    <input type="hidden" name="id_promo" value={{$p->id}}>
    <input type="hidden" name="result" value={{$results}}>
    <button  onClick="document.forms['estimate-form'].submit();" >Richiedi Preventivo</button>
    <hr>
</form>
@endforeach
