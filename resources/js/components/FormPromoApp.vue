<template>
  <div>
    <h2>Crea Promozione App</h2>
      <form method="POST" action="/admin/createPromo" enctype="multipart/form-data">

                    
                      <div class="form-group">
                          <label for="title">Nome Promo</label>
                          <input id="title" type="text" name="title" class="form-control" placeholder="Insersci testo domanda">
                                        </div>

                      <div class="form-group">
                          <label for="description">Descrizone Promo</label>
                          <input class="form-control" id="description" type="text" name="description" placeholder="Inserisci descrizione">
                          
                      </div>

                      
                      <div class="form-group">
                          <label for="score">Score Offerta</label>
                          <input class="form-control" id="score" type="text" name="score" placeholder="Inserisci descrizione">
                                        </div>

                      <div class="form-group">
                          <label for="image">Immagine Promo</label>
                          <input class="form-control" id="image" type="file" name="image" placeholder="Inserisci descrizione">
                        
                      </div>


                      <div class="form-group">
                          <label for="image">Messaggio promozionale</label>
                          <input class="form-control" id="promoMessage" type="text" name="promoMessage" placeholder="Inserisci descrizione">
                        
                      </div>
                            
      <h2>Prezzi Promo</h2>
      <h4>Che tipo di Applicazione?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>

            <div class="form-group">
        <label for="typeApp1">Android</label>
        <input class="form-control" id="typeApp1" type="text" name="typeApp1" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeApp2">IOS (Apple)</label>
        <input class="form-control" id="typeApp2" type="text" name="typeApp2" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeApp3">Android + IOS</label>
        <input class="form-control" id="typeApp3" type="text" name="typeApp3" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeApp4">Ibrida</label>
        <input class="form-control" id="typeApp4" type="text" name="typeApp4" placeholder="Inserisci Prezzo" required>       
      </div>
                  <div class="form-group">
        <label for="typeApp5">Altro</label>
        <input class="form-control" id="typeApp5" type="text" name="typeApp5" placeholder="Inserisci Prezzo" required>       
      </div>

      <hr>
      <h4>Scopo dell'App?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="infoApp1">Gioco per uso privato</label>
        <input class="form-control" id="infoApp1" type="text" name="infoApp1" placeholder="Inserisci Prezzo" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp2">Per business</label>
        <input class="form-control" id="infoApp2" type="text" name="infoApp2" placeholder="Inserisci Prezzo" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp3">Social network / community</label>
        <input class="form-control" id="infoApp3" type="text" name="infoApp3" placeholder="Inserisci Prezzo" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp4">E-commerce</label>
        <input class="form-control" id="infoApp4" type="text" name="infoApp4" placeholder="Inserisci Prezzo" required>       
      </div>

                  <div class="form-group">
        <label for="infoApp5">Servizio</label>
        <input class="form-control" id="infoApp5" type="text" name="infoApp5" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="infoApp6">Multimedia (immagini, video)</label>
        <input class="form-control" id="infoApp6" type="text" name="infoApp6" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="infoApp7">Prototipo MVP</label>
        <input class="form-control" id="infoApp7" type="text" name="infoApp7" placeholder="Inserisci Prezzo" required>       
      </div>

      <hr>
      <h4>Hai bisogno anche di : </h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>

      <div class="form-group">
        <label for="addService1">Creazione profilo degli utenti</label>
        <input class="form-control" id="addService1" type="text" name="addService1" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService2">Promozione su marketplaces</label>
        <input class="form-control" id="addService2" type="text" name="addService2" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService3">Multilingua</label>
        <input class="form-control" id="addService3" type="text" name="addService3" placeholder="Inserisci Prezzo" required>       
      </div>

        <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>
      </form>  


  </div>
</template>

<script>

export default {
  data: () => ({
    formValues: {}
  }),
  methods: {
    handleSubmit() {
        console.log(this.formValues)
    }
  }
};
</script>