<template>
  <div>
      <form method="POST" action="/admin/editPromo" enctype="multipart/form-data">
      <input type="hidden" name="_token" v-bind:value="csrf">

                    
                      <div class="form-group">
                          <label for="title">Nome Promo</label>
                          <input id="title" type="text" name="title" :value="promo.title" class="form-control" required placeholder="Insersci testo domanda">
                                        </div>

                      <div class="form-group">
                          <label for="description">Descrizone Promo</label>
                          <input class="form-control" id="description" :value="promo.description" type="text" name="description" required placeholder="Inserisci descrizione">
                         
                      </div>

                        <div class="form-group">
                    <label for="description">Email autore promo </label>
                    <input class="form-control" :value="promo.email" type="text" name="email" placeholder="Inserisci indirizzo email al quale recapitare le richieste" required>
                        </div>

                      
                      <div class="form-group">
                          <label for="score">Score Offerta</label>
                          <input class="form-control" id="score" type="text" :value="promo.score" name="score" required placeholder="Inserisci score offerrta">
                                        </div>
                      <div class="form-group">
                        <div class="contaier-fluid">
                          <div class="row">
                            <div class="col-lg-4">
                              <label for="image">Nuova Immagine Promo</label>
                              <div class="drag-image">
                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                <h6>Drag & Drop File Here</h6>
                                <span>OR</span>
                                <button>Browse File</button>
                                <input id="image" name="image" type="file" hidden >
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <label for="image">Immagine Utilizzata</label>
                              <img :src="promo.image" class="img-fluid">
                            </div>
                          </div>
                        </div>
                        
                        
                      </div>

                      <div class="form-group">
                          <label for="price">Prezzo</label>
                          <input class="form-control" id="price" :value="promo.price" type="text" name="price" required placeholder="Inserisci prezzo offerta">
                        
                      </div>

                    <div class="form-check"> <label for="tag1">Tag 1</label> <input type="checkbox" name="tag1" :checked="promo.tag1" class="option-input checkbox"></div>                
                    <div class="form-check"> <label for="tag2">Tag 2</label> <input type="checkbox" name="tag2" :checked="promo.tag2" class="option-input checkbox"></div>                   
                    <div class="form-check"> <label for="tag3">Tag 3</label> <input type="checkbox" name="tag3" :checked="promo.tag3" class="option-input checkbox"></div>

                      <div class="form-group">
                          <label for="image">Messaggio promozionale</label>
                          <input class="form-control" id="promoMessage" type="text" :value="promo.promoMessage" name="promoMessage" required placeholder="Inserisci messagio promozionale">
                        
                      </div>
                            <button type="submit" class="btn btn-primary" style="background-color: green;">Edit Promo</button>
      </form>

  </div>
</template>

<script>

export default {
    props: ['csrf','promo'],

};
</script>