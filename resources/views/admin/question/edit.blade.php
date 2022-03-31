<form method="POST" action="/admin/editQuestion">
@csrf
<label for="title">Testo domanda</label>
<input 
    type="hidden"
    name="id"
     value={{ $question->id }}>

<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror"
    value={{ $question->title }}>
 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br><br>

<label for="description">Descrizione Domanda</label>
 
<input id="description"
    type="text"
    name="description"
    class="@error('description') is-invalid @enderror"
    value={{ $question->description }}>

    
 
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

Risposta Obbligatoria
@if($question->is_required)  
    <input type="checkbox" id="required" name="is_require" value="true" checked >
@else
    <input type="checkbox" id="required" name="is_require" value="true" >
@endif

<div id="answerArray"></div>

<div class="container1">
    <button class="add_form_field">Aggiungi risposta &nbsp; 
      <span style="font-size:16px; font-weight:bold;">+ </span>
    </button>
    <div>Testo : <input type="text" id="text"></div>
    <div>Score : <input type="text" id="score"></div>
</div>

<input type="submit" value="Modifica"/>

</form>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
          
    var answersArray = JSON.parse({!! json_encode($question->answers) !!});
    var x = answersArray.length;
    var i = 0;

    while(answersArray.length>i){
        
        $(wrapper).append('<div>'+ answersArray[i].text +'--' + answersArray[i].score +'<a href="#" class="delete">Delete</a></div>'); //add input box
        i++;
    }
    
   

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

