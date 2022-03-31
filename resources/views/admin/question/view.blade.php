
<label for="title">Testo domanda : {{ $question->title }}</label> 
<br><br>
<label for="description">Descrizione Domanda : {{ $question->description }}</label>
<br><br>   
Risposta Obbligatoria : 
@if($question->is_required)  
    Si
@else
    No
@endif

<br><br>
<div class="container1">
    Lista risposte
<hr>
@foreach ($answers as $a)
    <div>Testo : {{$a->text}}</div>
    <div>Score : {{$a->score}}</div>
    <hr>
@endforeach

</div>







