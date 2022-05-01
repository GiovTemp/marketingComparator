<template>
  <div>
    <h2>Crea Promozione Per la sezione Web</h2>
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
      <h4>Che tipo di sito?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="typeWeb1">Sito web personale</label>
        <input class="form-control" id="typeWeb1" type="text" name="typeWeb1" placeholder="Inserisci Prezzo">       
      </div>
      <input type="text" name="typeWeb1" label="" validation="required" />
      <input type="text" name="typeWeb2" label="BlogSocial network / Community" validation="required" />
      <input type="text" name="typeWeb3" label="E-commerce" validation="required" />
      <input type="text" name="typeWeb4" label="Newsletter" validation="required" />
      <input type="text" name="typeWeb5" label="Sito vetrina" validation="required" />
      <input type="text" name="typeWeb6" label="CMS o sezione amministrativa" validation="required" />
      <input type="text" name="typeWeb7" label="Pagina di atterraggio" validation="required" />
      <input type="text" name="typeWeb8" label="Sito aziendale" validation="required" />
      <input type="text" name="typeWeb9" label="Altro" validation="required" />
      <hr>
      <h4>Quante pagine sono coinvolte?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <input type="text" name="pricePage1" label="1-5 pagine" validation="required" />
      <input type="text" name="pricePage2" label="5-20 pagine" validation="required" />
      <input type="text" name="pricePage3" label="20-100 pagine" validation="required" />
      <input type="text" name="pricePage4" label="Più di 100 pagine" validation="required" />
      <hr>
      <h4>Hai bisogno anche di : </h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <input type="text" name="addService1" label="Creazione profilo degli utenti" validation="required" />
      <input type="text" name="addService2" label="Comprare il dominio" validation="required" />
      <input type="text" name="addService3" label="Caricare video" validation="required" />
      <input type="text" name="addService4" label="Caricare immagini" validation="required" />
      <input type="text" name="addService5" label="Ottimizzare le Keywords e posizionarlo sui motori di ricerca" validation="required" />
      <input type="text" name="addService6" label="Sito multilingua" validation="required" />
      <input type="text" name="addService7" label="Gestione server" validation="required" />
      <input type="text" name="addService8" label="Web mobile responsive" validation="required" />
      <input type="text" name="addService9" label="Transazioni con Paypal, carte di credito o altro" validation="required" />

       <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>

          </form>


    <h3>Values:</h3>


    {{formValues}}

  </div>
</template>

<script>
import axios from 'axios';
export default {
    props: ['section_id'],
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