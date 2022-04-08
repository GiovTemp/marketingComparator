@extends('layouts.appAdmin')

@section('content')

<form method="POST" action="/admin/createQuestion">
@csrf
<label for="title">Testo domanda</label>
 
<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror">
 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>

<label for="description">Descrizione Domanda</label>
 
<input id="description"
    type="text"
    name="description"
    class="@error('description') is-invalid @enderror">

    
 
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div id="answerArray"></div>



<input type="submit"/>

</form>


<div class="container1">
    <button class="add_form_field">Aggiungi risposta &nbsp; 
      <span style="font-size:16px; font-weight:bold;">+ </span>
    </button>
    <div>Testo : <input type="text" id="text"></div>
    <div>Score : <input type="text" id="score"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
    var answersArray=[];

    var x = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            
            var text = document.getElementById('text').value;
            var score = document.getElementById('score').value;
            var answerJSON={"text":text, "score":score};
            answersArray.push(answerJSON); 
            $(wrapper).append('<div id="'+x+'">'+ text +'--' + score +'<a href="#" class="delete">Delete</a></div>'); //add input box

            const element = document.getElementById("answerArray");
            element.innerHTML = '<input type="hidden" id="answers" name="answers" value='+JSON.stringify(answersArray)+'>';
            x++;
        } else {
            alert('You Reached the limits')
        }
    });


    //aggiungere delete risposta tramite hidden input con x-1
    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        var position =event.target.parentElement.id;
        answersArray.splice(1,position);
        $(this).parent('div').remove();
        x--;
        const element = document.getElementById("answerArray");
        element.innerHTML = '<input type="hidden" id="answers" name="answers" value='+JSON.stringify(answersArray)+'>';
    })
});
</script>


@endsection