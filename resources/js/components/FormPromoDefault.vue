<template>
  <div>
    <h2>Crea Promozione </h2>
    <FormulateForm v-model="formValues" @submit="handleSubmit">
      <FormulateInput type="submit" label="Crea Promo" />

      <FormulateInput name="title" label="Nome Promozione" validation="required" />
      <FormulateInput name="description" label="Descrizione Promozione" validation="required" />
      <FormulateInput name="score" label="Score offerta" validation="required" />
      <FormulateInput name="price" label="Prezzo" validation="required" />
      <FormulateInput type="image" name="image" label="Immagine Promo" validation="required" />     

      

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