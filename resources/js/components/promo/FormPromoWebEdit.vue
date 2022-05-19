<template>
  <div>

    <form method="POST" action="/admin/editPromo" enctype="multipart/form-data">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <input type="hidden" name="id" v-bind:value="promo.id">
         <input type="hidden" name="id_section" v-bind:value="promo.id_section">
                <div class="form-group">
                    <label for="title">Nome Promo</label>
                    <input id="title" type="text" :value="promo.title"  name="title" class="form-control" required placeholder="Insersci testo Promo">
                </div>

                <div class="form-group">
                    <label for="description">Descrizone Promo</label>
                    <input class="form-control" :value="promo.description"  id="description" type="text" name="description" placeholder="Inserisci descrizione" required>
                    
                </div>

                
                <div class="form-group">
                    <label for="score">Score Offerta</label>
                    <input class="form-control"  :value="promo.score"  id="score" type="text" name="score" placeholder="Inserisci score offerta" required>
                </div>

                <div class="form-group">
                    <label for="description">Email autore promo </label>
                    <input class="form-control" :value="promo.email" type="text" name="email" placeholder="Inserisci indirizzo email al quale recapitare le richieste" required>
                  
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
                    <input class="form-control"  :value="promo.promoMessage" id="promoMessage" type="text" name="promoMessage" placeholder="messaggio promozionale">
                   
                </div>
           
                    


      <h2>Prezzi Promo</h2>
      <h4>Che tipo di sito?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="typeWeb1">Sito web personale</label>
        <input class="form-control" id="typeWeb1" type="text" name="typeWeb1" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[0]" >       
      </div>
            <div class="form-group">
        <label for="typeWeb2">BlogSocial network / Community</label>
        <input class="form-control" id="typeWeb2" type="text" name="typeWeb2" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[1]" >       
      </div>
            <div class="form-group">
        <label for="typeWeb3">E-commerce</label>
        <input class="form-control" id="typeWeb3" type="text" name="typeWeb3" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[2]" >       
      </div>
            <div class="form-group">
        <label for="typeWeb4">Newsletter</label>
        <input class="form-control" id="typeWeb4" type="text" name="typeWeb4" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[3]" >       
      </div>
            <div class="form-group">
        <label for="typeWeb5">Sito vetrina</label>
        <input class="form-control" id="typeWeb5" type="text" name="typeWeb5" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[4]" >       
      </div>
            <div class="form-group">
        <label for="typeWeb6">CMS o sezione amministrativa</label>
        <input class="form-control" id="typeWeb6" type="text" name="typeWeb6" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[5]"  >       
      </div>
            <div class="form-group">
        <label for="typeWeb7">Pagina di atterraggio</label>
        <input class="form-control" id="typeWeb7" type="text" name="typeWeb7" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[6]"  >       
      </div>
            <div class="form-group">
        <label for="typeWeb8">Sito aziendale</label>
        <input class="form-control" id="typeWeb8" type="text" name="typeWeb8" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[7]"  >       
      </div>
      <div class="form-group">
        <label for="typeWeb9">Altro</label>
        <input class="form-control" id="typeWeb9" type="text" name="typeWeb9" placeholder="Inserisci Prezzo" required :value="infoPrice.typeWeb[8]"  >       
      </div>
      <hr>
      <h4>Quante pagine sono coinvolte?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <div class="form-group">
        <label for="pricePage1">1-5 pagine</label>
        <input class="form-control" id="pricePage1" type="text" name="pricePage1" placeholder="Inserisci Prezzo" required :value="infoPrice.pricePage[0]">       
      </div>

            <div class="form-group">
        <label for="pricePage2">5-20 pagine</label>
        <input class="form-control" id="pricePage2" type="text" name="pricePage2" placeholder="Inserisci Prezzo" required :value="infoPrice.pricePage[1]">       
      </div>

            <div class="form-group">
        <label for="pricePage3">20-100 pagine</label>
        <input class="form-control" id="pricePage3" type="text" name="pricePage3" placeholder="Inserisci Prezzo" required :value="infoPrice.pricePage[2]">       
      </div>

            <div class="form-group">
        <label for="pricePage4">Più di 100 pagine</label>
        <input class="form-control" id="pricePage4" type="text" name="pricePage4" placeholder="Inserisci Prezzo" required :value="infoPrice.pricePage[3]">       
      </div>

      <hr>
      <h4>Hai bisogno anche di : </h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>

      <div class="form-group">
        <label for="addService1">Creazione profilo degli utenti</label>
        <input class="form-control" id="addService1" type="text" name="addService1" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[0]">       
      </div>

      <div class="form-group">
        <label for="addService2">Comprare il dominio</label>
        <input class="form-control" id="addService2" type="text" name="addService2" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[1]">       
      </div>

      <div class="form-group">
        <label for="addService3">Caricare video</label>
        <input class="form-control" id="addService3" type="text" name="addService3" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[2]">       
      </div>

      <div class="form-group">
        <label for="addService4">Caricare immagini</label>
        <input class="form-control" id="addService4" type="text" name="addService4" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[3]">       
      </div>

      <div class="form-group">
        <label for="addService5">Ottimizzare le Keywords e posizionarlo sui motori di ricerca</label>
        <input class="form-control" id="addService5" type="text" name="addService5" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[4]">       
      </div>

      <div class="form-group">
        <label for="addService6">Sito multilingua</label>
        <input class="form-control" id="addService6" type="text" name="addService6" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[5]">       
      </div>

      <div class="form-group">
        <label for="addService7">Gestione server</label>
        <input class="form-control" id="addService7" type="text" name="addService7" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[6]">       
      </div>

      <div class="form-group">
        <label for="addService8">Web mobile responsive</label>
        <input class="form-control" id="addService8" type="text" name="addService8" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[7]">       
      </div>

      <div class="form-group">
        <label for="addService9">Transazioni con Paypal, carte di credito o altro</label>
        <input class="form-control" id="addService9" type="text" name="addService9" placeholder="Inserisci Prezzo" required :value="infoPrice.addService[8]">       
      </div>


       <button type="submit" class="btn btn-primary" style="background-color: green;">Edit Promo</button>

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