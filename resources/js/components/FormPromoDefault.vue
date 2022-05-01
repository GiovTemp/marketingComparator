<template>
  <div>
    <h2>Crea Promozione </h2>
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
                          <label for="price">Prezzo</label>
                          <input class="form-control" id="price" type="text" name="price" placeholder="Inserisci descrizione">
                        
                      </div>

                      <div class="form-group">
                          <label for="image">Messaggio promozionale</label>
                          <input class="form-control" id="promoMessage" type="text" name="promoMessage" placeholder="Inserisci descrizione">
                        
                      </div>
                            <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>
      </form>

  </div>
</template>

<script>

export default {
  data: () => ({
    formValues: {},
    questions:[
      {"id":3,"title":"Domanda 3","description":"aa","is_required":1,answers:[{"id":0,"text":"Risposta a","score":"40"},{"id":1,"text":"Risposta b","score":"40"}],"order":2,"id_section":1,"price":1},
      {"id":4,"title":"Domanda 4","description":"aa","is_required":1,answers:[{"id":0,"text":"Risposta a","score":"40"},{"id":1,"text":"Risposta b","score":"40"}],"order":2,"id_section":1,"price":1},
      ]
  }),
  methods: {
    handleSubmit() {
        console.log(this.formValues)
    }
  }
};
</script>