<template>
  <div>
      <form method="POST" action="/admin/editPromo" enctype="multipart/form-data">
        <input type="hidden" name="_token" v-bind:value="csrf">

                      <div class="form-group">
                          <label for="title">Nome Promo</label>
                          <input id="title" type="text" name="title" class="form-control" :value="promo.title" required placeholder="Insersci testo domanda">
                                        </div>

                      <div class="form-group">
                          <label for="description">Descrizone Promo</label>
                          <input class="form-control" id="description" type="text" name="description" :value="promo.description" required placeholder="Inserisci descrizione">
                          
                      </div>

                  <div class="form-group">
                    <label for="description">Email autore promo </label>
                    <input class="form-control" :value="promo.email" type="text" name="email" placeholder="Inserisci indirizzo email al quale recapitare le richieste" required>
                  </div>

                      
                      <div class="form-group">
                          <label for="score">Score Offerta</label>
                          <input class="form-control" id="score" type="text" name="score" :value="promo.score" required placeholder="Inserisci score offerrta">
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
                          <label for="image">Messaggio promozionale</label>
                          <input class="form-control" :value="promo.promoMessage" id="promoMessage" type="text" name="promoMessage" required placeholder="Inserisci messaggio promozionale">
                        
                      </div>
                            
      <h2>Prezzi Promo</h2>
      <h4>Che tipo di Applicazione?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>

            <div class="form-group">
        <label for="typeApp1">Android</label>
        <input class="form-control" id="typeApp1" type="text" name="typeApp1" placeholder="Inserisci Prezzo"  :value="infoPrice.typeApp[0]" required>       
      </div>
            <div class="form-group">
        <label for="typeApp2">IOS (Apple)</label>
        <input class="form-control" id="typeApp2" type="text" name="typeApp2" placeholder="Inserisci Prezzo" :value="infoPrice.typeApp[1]" required>       
      </div>
            <div class="form-group">
        <label for="typeApp3">Android + IOS</label>
        <input class="form-control" id="typeApp3" type="text" name="typeApp3" placeholder="Inserisci Prezzo" :value="infoPrice.typeApp[2]" required>       
      </div>
            <div class="form-group">
        <label for="typeApp4">Ibrida</label>
        <input class="form-control" id="typeApp4" type="text" name="typeApp4" placeholder="Inserisci Prezzo" :value="infoPrice.typeApp[3]" required>       
      </div>
                  <div class="form-group">
        <label for="typeApp5">Altro</label>
        <input class="form-control" id="typeApp5" type="text" name="typeApp5" placeholder="Inserisci Prezzo" :value="infoPrice.typeApp[4]" required>       
      </div>

      <hr>
      <h4>Scopo dell'App?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="infoApp1">Gioco per uso privato</label>
        <input class="form-control" id="infoApp1" type="text" name="infoApp1" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[0]" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp2">Per business</label>
        <input class="form-control" id="infoApp2" type="text" name="infoApp2" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[1]" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp3">Social network / community</label>
        <input class="form-control" id="infoApp3" type="text" name="infoApp3" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[2]" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp4">E-commerce</label>
        <input class="form-control" id="infoApp4" type="text" name="infoApp4" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[3]" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp5">Servizio</label>
        <input class="form-control" id="infoApp5" type="text" name="infoApp5" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[4]" required>       
      </div>

      <div class="form-group">
        <label for="infoApp6">Multimedia (immagini, video)</label>
        <input class="form-control" id="infoApp6" type="text" name="infoApp6" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[5]" required>       
      </div>

      <div class="form-group">
        <label for="infoApp7">Prototipo MVP</label>
        <input class="form-control" id="infoApp7" type="text" name="infoApp7" placeholder="Inserisci Prezzo" :value="infoPrice.infoApp[6]" required>       
      </div>

      <hr>
      <h4>Hai bisogno anche di : </h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>

      <div class="form-group">
        <label for="addService1">Creazione profilo degli utenti</label>
        <input class="form-control" id="addService1" type="text" name="addService1" placeholder="Inserisci Prezzo" :value="infoPrice.addService[0]" required>       
      </div>

      <div class="form-group">
        <label for="addService2">Promozione su marketplaces</label>
        <input class="form-control" id="addService2" type="text" name="addService2" placeholder="Inserisci Prezzo" :value="infoPrice.addService[1]" required>       
      </div>

      <div class="form-group">
        <label for="addService3">Multilingua</label>
        <input class="form-control" id="addService3" type="text" name="addService3" placeholder="Inserisci Prezzo" :value="infoPrice.addService[2]" required>       
      </div>

        <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>
      </form>  


  </div>
</template>

<script>

export default {
    props: ['csrf','promo'],
data: () => ({
    infoPrice: {},
  }),
    mounted() {    
    this.infoPrice = JSON.parse(this.promo.price)
  }
};
</script>