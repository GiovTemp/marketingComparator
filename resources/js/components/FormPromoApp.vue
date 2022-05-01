<template>
  <div>
    <h2>Crea Promozione App</h2>
    <FormulateForm v-model="formValues" @submit="handleSubmit">
      <FormulateInput type="submit" label="Crea Promo" />

      <FormulateInput name="title" label="Nome Promozione" validation="required" />
      <FormulateInput name="description" label="Descrizione Promozione" validation="required" />
      <FormulateInput name="score" label="Score offerta" validation="required" />
      <FormulateInput type="image" name="image" label="Immagine Promo" validation="required" />     

      <h2>Prezzi Promo</h2>
      <h4>Che tipo di Applicazione?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <FormulateInput name="typeApp1" label="Android" validation="required" />
      <FormulateInput name="typeApp2" label="IOS (Apple)" validation="required" />
      <FormulateInput name="typeApp3" label="Android + IOS" validation="required" />
      <FormulateInput name="typeApp4" label="Ibrida" validation="required" />
      <FormulateInput name="typeApp5" label="Altro" validation="required" />
      <hr>
      <h4>Scopo dell'App?</h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <FormulateInput name="infoApp1" label="Gioco per uso privato" validation="required" />
      <FormulateInput name="infoApp2" label="Per business" validation="required" />
      <FormulateInput name="infoApp3" label="Social network / community" validation="required" />
      <FormulateInput name="infoApp4" label="E-commerce" validation="required" />
      <FormulateInput name="infoApp5" label="Servizio" validation="required" />
      <FormulateInput name="infoApp6" label="Multimedia (immagini, video)" validation="required" />
      <FormulateInput name="infoApp7" label="Prototipo MVP" validation="required" />
      <hr>
      <h4>Hai bisogno anche di : </h4>
      <h5>Inserire i prezzi in valori numerici ( no simboli ) </h5>
      <FormulateInput name="addService1" label="Creazione profilo degli utenti" validation="required" />
      <FormulateInput name="addService2" label="Promozione su marketplaces" validation="required" />
      <FormulateInput name="addService3" label="Multilingua" validation="required" />


    <h3>Values:</h3>

    </FormulateForm>
    {{formValues}}

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