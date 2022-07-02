<template>
  <div>
    <h2>Crea Domanda</h2>
    <FormulateForm v-model="formValues" @submit="handleSubmit">
      <FormulateInput type="submit" label="Crea Domanda" />
      <FormulateInput name="title" label="Testo Domanda" validation="required" />
      <FormulateInput name="description" label="Descrizione Domanda" validation="required" />
      <FormulateInput type="checkbox" name="is_required" label="Domanda Obbligatoria"/>
      <FormulateInput type="checkbox" name="is_multi" label="Multirisposta" />
      <FormulateInput type="checkbox" name="is_price" label="Domanda che determina il prezzo" />
          
    </FormulateForm>

    <FormulateForm v-model="answer" @submit="createAnswer">
      <FormulateInput name="text" label="Testo Risposta" validation="required" />
      <FormulateInput type="submit" label="Inserisci Risposta" />
    </FormulateForm>

    <div v-for="(answer, index) in answersList" :key="answer.text">
      Testo Risposta : {{answer.text}} <br>
      <button class="delete btn btn-primary" style="background-color: red;" @click="deleteAnswer(index)">Elimina Risposta</button>
      <hr>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ['section_id'],
   name: 'form-create-question',
  data: () => ({
    formValues: {},
    answersList:[],
    answer: {},
    }),
  methods: {
    handleSubmit() {
      axios.post('/admin/createQuestion', {
                    id_section: this.section_id,
                    question_data: this.formValues,
                    answersList : this.answersList

            }).then((response) => {
                if(response.data===1){
                  alert("Domanda inserita correttamente")
                }else{
                  console.log(response.data)
                  alert("Qualcosa è andato storto. Contatta il webmaster");
                }
            }).catch((error) => {
               alert("Qualcosa è andato storto. Contatta il webmaster");
               console.log(error.response)
            })
       },
    createAnswer(){
      this.answersList.push(this.answer)
    },
    deleteAnswer(index){
      this.answersList.splice(index, 1);     
    }

  },

};
</script>