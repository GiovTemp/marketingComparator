@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Edit Questions</h6>
            </div>
            <div class="card-body p-3">
              PRESTO DISPONIBILE
              <!--
              <form method="POST" action="/admin/createQuestion">
              <div id="answerArray">
                  </div>
                @csrf
                <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Domada</button>
                <div class="form-group">
                    <label for="title">Testo domanda</label>
                    <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Insersci testo domanda" value={{ $question->title }} >
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descrizone Domanda</label>
                    <input class="form-control @error('description') is-invalid @enderror" id="description" type="text" name="description" placeholder="Inserisci descrizione" value={{ $question->description }} >
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                        <label for="text">Testo risposta</label>
                        <input type="text" class="form-control" id="text" placeholder="Insersci testo della risposta">
                    </div>
                    <div class="form-group">
                        <label for="score">Score Risposta</label>
                        <input type="score" class="form-control" id="score" placeholder="Insersci punteggio risposta">
                    </div>
                </div>              
                    
                <button type="submit" class="add_form_field btn btn-primary"style="background-color:#5e72e4;">Inserisci Risposta</button>
                

                <div class="container1">
                    

                <div class="table-responsive">
                  Lista Risposte
                  <table class="table align-items-center ">
                    <tbody>
              
                    </tbody>
                  </table>

                </div>
              </form>
-->
            </div>
          </div>
        </div>
      </div>
    </div>

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

@endsection