<template>
  <div>
    <h2>Modifica Domanda</h2>
    <FormulateForm v-model="question" @submit="handleSubmit">
      <FormulateInput type="submit" label="Modifica" />
      <FormulateInput name="title" :value="question.title" label="Testo Domanda" validation="required" />
      <FormulateInput name="description" :value="question.description" label="Descrizione Domanda" validation="required" />
      <FormulateInput type="checkbox" name="is_required" :value="question.is_required" label="Domanda Obbligatoria"/>
      <FormulateInput  type="checkbox" name="is_multi" :value="question.is_multi" label="Multirisposta" />
      <FormulateInput type="checkbox" name="is_price" :value="question.is_price" label="Domanda che determina il prezzo" />
      
    </FormulateForm>

    <FormulateForm v-model="answer" @submit="createAnswer">
      <FormulateInput name="text"  label="Testo Risposta" validation="required" />

      <FormulateInput type="submit" label="Inserisci Risposta" />
    </FormulateForm>

    <div v-for="(answer, index) in answersList" :key="index">
        <FormulateInput name="text" :value="answer.text" :key="index" v-model="answersList[index].text" label="Testo Risposta" validation="required" />

      <button class="delete btn btn-primary" style="background-color: red;" @click="deleteAnswer(index)">Elimina Risposta</button>
      <hr>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ['question'],
  name: 'form-edit-question',
  data: () => ({
    answersList:[],
    answer: {},
    }),
  mounted() {    
    this.answersList = JSON.parse(this.question.answers)
  },
  methods: {
    handleSubmit() {
      this.question.answers=this.answersList
      axios.post('/admin/editQuestion', {
                    question: this.question,
            }).then((response) => {
                if(response.data===1){
                  alert("Domanda modificata correttamente")
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