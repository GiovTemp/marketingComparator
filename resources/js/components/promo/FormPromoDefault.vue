<template>
  <div>
    <h2>Crea Promozione </h2>
      <form method="POST" action="/admin/createPromo" enctype="multipart/form-data">
      <input type="hidden" name="_token" v-bind:value="csrf">
                    <input id="id_section" type="hidden" name="id_section" v-bind:value="section_id">
                    
                      <div class="form-group">
                          <label for="title">Nome Promo</label>
                          <input id="title" type="text" name="title" class="form-control" required placeholder="Insersci testo domanda">
                                        </div>

                      <div class="form-group">
                          <label for="description">Descrizone Promo</label>
                          <input class="form-control" id="description" type="text" name="description" required placeholder="Inserisci descrizione">
                          
                      </div>

                      
                      <div class="form-group">
                          <label for="score">Score Offerta</label>
                          <input class="form-control" id="score" type="text" name="score" required placeholder="Inserisci score offerrta">
                                        </div>

                      <div class="form-group">
                          <label for="image">Immagine Promo</label>
                          <input class="form-control" id="image" type="file" name="image" required >
                        
                      </div>

                      <div class="form-group">
                          <label for="price">Prezzo</label>
                          <input class="form-control" id="price" type="text" name="price" required placeholder="Inserisci prezzo offerta">
                        
                      </div>

                      <div class="form-group">
                          <label for="image">Messaggio promozionale</label>
                          <input class="form-control" id="promoMessage" type="text" name="promoMessage" required placeholder="Inserisci messagio promozionale">
                        
                      </div>
                            <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>
      </form>

  </div>
</template>

<script>

export default {
    props: ['csrf','section_id'],
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