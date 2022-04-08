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
                @csrf

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

                <div class="container1">
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
                      <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Domada</button>

                      <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>

               
                <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0"> Testo Risposta </p>
                          <h6 class="text-sm mb-0"></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Score</p>
                        
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Azioni</p>
                        
                      </div>
                    </td>
      

                  </tr>

                <div id="answerArray">

                </div>
                  

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
        if (x < max_fields) {
            
            var text = document.getElementById('text').value;
            var score = document.getElementById('score').value;
            var answerJSON={"text":text, "score":score};
            answersArray.push(answerJSON); 
            $(wrapper).append('<div id="'+x+'"><tr> <td class="w-30"> <div class="d-flex px-2 py-1 align-items-center"> <div class="ms-4"> <p class="text-xs font-weight-bold mb-0"> Testo Risposta </p><h6 class="text-sm mb-0"></h6> </div></div></td><td> <div class="text-center"> <p class="text-xs font-weight-bold mb-0">Score</p></div></td><td> <div class="text-center"> <p class="text-xs font-weight-bold mb-0">Azioni</p></div></td></tr><a href="#" class="delete">Delete</a></div>'); //add input box

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