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
            <label for="description">Email autore promo </label>
            <input class="form-control" id="email" type="text" name="email" placeholder="Inserisci indirizzo email al quale recapitare le richieste" required>
         </div>
         <div class="form-group">
            <label for="image">Immagine Promo</label>
            <div class="drag-image">
               <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
               <h6>Drag & Drop File Here</h6>
               <span>OR</span>
               <button type="button">Browse File</button>
               <input id="image" name="image" type="file" hidden required>
            </div>
         </div>
         <div class="form-check"> <label for="tag1">Tag 1</label> <input type="checkbox" name="tag1" class="option-input checkbox"></div>
         <div class="form-check"> <label for="tag2">Tag 2</label> <input type="checkbox" name="tag2" class="option-input checkbox"></div>
         <div class="form-check"> <label for="tag3">Tag 3</label> <input type="checkbox" name="tag3" class="option-input checkbox"></div>
         <div class="form-group">
            <label for="image">Messaggio promozionale</label>
            <input class="form-control" id="promoMessage" type="text" name="promoMessage" placeholder="messaggio promozionale">
         </div>
         <h2>Prezzi Promo</h2>
          <div v-for="question in questions" :key="question.id">

          </div>

         <button type="submit" class="btn btn-primary" style="background-color: green;">Crea Promo</button>
      </form>
   </div>
</template>

<script>
import axios from 'axios';
export default {
    props: ['csrf','section_id','questions'],
        name: 'form-promo-web',
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