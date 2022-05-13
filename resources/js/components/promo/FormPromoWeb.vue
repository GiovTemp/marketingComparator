<template>
  <div>
    <h2>Crea Promozione Per la sezione Web</h2>
    <form method="POST" action="/admin/createPromo" enctype="multipart/form-data">
        <input type="hidden" name="_token" v-bind:value="csrf">
          <input id="id_section" type="hidden" name="id_section" v-bind:value="section_id">
  
                <div class="form-group">
                    <label for="title">Nome Promo</label>
                    <input id="title" type="text" name="title" class="form-control" required placeholder="Insersci titolo Promozione">
                                   </div>

                <div class="form-group">
                    <label for="description">Descrizone Promo</label>
                    <input class="form-control" id="description" type="text" name="description" placeholder="Inserisci descrizione" required>
                    
                </div>

                
                <div class="form-group">
                    <label for="score">Score Offerta</label>
                    <input class="form-control" id="score" type="text" name="score" placeholder="Inserisci score offerta" required>
                                   </div>

                <div class="form-group">
                    <label for="image">Immagine Promo</label>
                    <input class="form-control" id="image" type="file" name="image" required>
                   
                </div>

                <div class="form-group">
                    <label for="image">Messaggio promozionale</label>
                    <input class="form-control" id="promoMessage" type="text" name="promoMessage" placeholder="messaggio promozionale">
                   
                </div>
           
                    


      <h2>Prezzi Promo</h2>
      <h4>Che tipo di sito?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="typeWeb1">Sito web personale</label>
        <input class="form-control" id="typeWeb1" type="text" name="typeWeb1" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb2">BlogSocial network / Community</label>
        <input class="form-control" id="typeWeb2" type="text" name="typeWeb2" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb3">E-commerce</label>
        <input class="form-control" id="typeWeb3" type="text" name="typeWeb3" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb4">Newsletter</label>
        <input class="form-control" id="typeWeb4" type="text" name="typeWeb4" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb5">Sito vetrina</label>
        <input class="form-control" id="typeWeb5" type="text" name="typeWeb5" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb6">CMS o sezione amministrativa</label>
        <input class="form-control" id="typeWeb6" type="text" name="typeWeb6" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb7">Pagina di atterraggio</label>
        <input class="form-control" id="typeWeb7" type="text" name="typeWeb7" placeholder="Inserisci Prezzo" required>       
      </div>
            <div class="form-group">
        <label for="typeWeb8">Sito aziendale</label>
        <input class="form-control" id="typeWeb8" type="text" name="typeWeb8" placeholder="Inserisci Prezzo" required>       
      </div>
      <div class="form-group">
        <label for="typeWeb9">Altro</label>
        <input class="form-control" id="typeWeb9" type="text" name="typeWeb9" placeholder="Inserisci Prezzo" required>       
      </div>
      <hr>
      <h4>Quante pagine sono coinvolte?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="pricePage1">1-5 pagine</label>
        <input class="form-control" id="pricePage1" type="text" name="pricePage1" placeholder="Inserisci Prezzo" required>       
      </div>

            <div class="form-group">
        <label for="pricePage2">5-20 pagine</label>
        <input class="form-control" id="pricePage2" type="text" name="pricePage2" placeholder="Inserisci Prezzo" required>       
      </div>

            <div class="form-group">
        <label for="pricePage3">20-100 pagine</label>
        <input class="form-control" id="pricePage3" type="text" name="pricePage3" placeholder="Inserisci Prezzo" required>       
      </div>

            <div class="form-group">
        <label for="pricePage4">Più di 100 pagine</label>
        <input class="form-control" id="pricePage4" type="text" name="pricePage4" placeholder="Inserisci Prezzo" required>       
      </div>

      <hr>
      <h4>Hai bisogno anche di : </h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>

      <div class="form-group">
        <label for="addService1">Creazione profilo degli utenti</label>
        <input class="form-control" id="addService1" type="text" name="addService1" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService2">Comprare il dominio</label>
        <input class="form-control" id="addService2" type="text" name="addService2" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService3">Caricare video</label>
        <input class="form-control" id="addService3" type="text" name="addService3" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService4">Caricare immagini</label>
        <input class="form-control" id="addService4" type="text" name="addService4" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService5">Ottimizzare le Keywords e posizionarlo sui motori di ricerca</label>
        <input class="form-control" id="addService5" type="text" name="addService5" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService6">Sito multilingua</label>
        <input class="form-control" id="addService6" type="text" name="addService6" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService7">Gestione server</label>
        <input class="form-control" id="addService7" type="text" name="addService7" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService8">Web mobile responsive</label>
        <input class="form-control" id="addService8" type="text" name="addService8" placeholder="Inserisci Prezzo" required>       
      </div>

      <div class="form-group">
        <label for="addService9">Transazioni con Paypal, carte di credito o altro</label>
        <input class="form-control" id="addService9" type="text" name="addService9" placeholder="Inserisci Prezzo" required>       
      </div>


       <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>

          </form>

  </div>
</template>

<script>
import axios from 'axios';
export default {
    props: ['csrf','section_id'],
  data: () => ({
    formValues: {},
  }),
  methods: {
    handleSubmit() {
             axios.post('/admin/createPromo', {
                    id_section: this.section_id,
                    promo_data: this.formValues,

            }).then((response) => {
              console.log(response.data)
              /*
                if(response.data===true){
                  alert("Promo inserita correttamente")
                }else{
                  alert("Qualcosa è andato storto. Contatta il webmaster");
                }
                */
            }).catch((error) => {
               alert("Qualcosa è andato storto. Contatta il webmaster");
               console.log(error.response)
            })
       },
  }
};
</script>