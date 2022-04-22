@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Create Questions</h6>
            </div>
            <div class="card-body p-3">
              <form method="POST" action="/admin/createQuestion">
              <div id="answerArray">
                  </div>
                @csrf
                <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Domada</button>
                <div class="form-group">
                    <label for="title">Testo domanda</label>
                    <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Insersci testo domanda">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descrizone Domanda</label>
                    <input class="form-control @error('description') is-invalid @enderror" id="description" type="text" name="description" placeholder="Inserisci descrizione">
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
    var answersArray=[];

    var x = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
          var text = document.getElementById('text').value;
          var score = document.getElementById('score').value;
          var answerJSON={"id":x, "text":text, "score":score};
          answersArray.push(answerJSON); 
          $(wrapper).append('<tr id="'+x+'"><td class="w-30"> <div class="d-flex px-2 py-1 align-items-center"> <div class="ms-4"> <p class="text-xs font-weight-bold mb-0">Testo risposta</p><h6 class="text-sm mb-0">'+text+'</h6> </div></div></td><td> <div class="text-center"> <p class="text-xs font-weight-bold mb-0">Score</p><h6 class="text-sm mb-0">'+score+'</h6> </div></td><td class="align-middle text-sm"> <div class="col text-center" id="'+x+'"> <button type="button" class="delete btn btn-primary" style="background-color: red;" >Delete</button> </div></td></tr>'); //add input box

          const element = document.getElementById("answerArray");
          var object = JSON.stringify(answersArray);
          var data = object.replaceAll( " ","\\/");
          element.innerHTML = '<input type="hidden" id="answers" name="answers" value='+data+'>';
          
          x++;
        
    });


    //aggiungere delete risposta tramite hidden input con x-1
    $(wrapper).on("click", ".delete", function(e) {        
        e.preventDefault();
        var id =event.target.parentElement.id;
        findAndRemove(answersArray, 'id', parseInt(id));
        document.getElementById(id).remove();

        const element = document.getElementById("answerArray");
        element.innerHTML = '<input type="hidden" id="answers" name="answers" value='+JSON.stringify(answersArray)+'>';

        console.log(JSON.stringify(answersArray));
    })

    function findAndRemove(array, property, value) {
      array.forEach(function(result, index) {
        if(result[property] === value) {     
        array.splice(index, 1);
        }    
      });
    }

});
</script>


@endsection