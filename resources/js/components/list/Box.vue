<template>
                    
     <div class="row" style="margin-top:20px;margin-bottom:20px;">
        <div class="col-lg-12">
        <center><h3>Offerte Disponibili</h3></center>
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img :src="item.image" class="w-100" />
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5>{{item.title}}</h5>

                <div class="mt-1 mb-0 text-muted small">
                  <span v-if="item.tag1===1">Tag 1</span>
                  <span class="text-primary" v-if="item.tag2===1"> • </span>
                  <span v-if="item.tag2===1">Tag 2</span>
                  <span class="text-primary" v-if="item.tag3===1"> • </span>
                  <span v-if="item.tag3===1">Tag 2</span>
                </div>
                <p class="mb-4 mb-md-0">
                    {{item.description}}
                </p>
                <div class="alert alert-info" role="alert" v-if="item.promoMessage!==null">
                    {{item.promoMessage}}
                </div>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">{{item.total}} €</h4>
                </div>
                <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary" style="margin-top:10px;margin-bottom:10px;" v-on:click="requestCall(item)">Ti chiamiamo noi &nbsp;&nbsp; <font-awesome-icon icon="fa-solid fa-phone" /></button>
                    <button class="btn btn-success" style="margin-top:10px;margin-bottom:10px;" v-on:click="prova(item.id)">Richiedi preventivo &nbsp;&nbsp; <font-awesome-icon icon="fa-solid fa-envelope" /></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  
</template>

<script>
export default {
      name: 'box',
      props:['item','imgSrc','results'],
         methods:{
             requestCall(item){
                 axios.post('/requestEstimate', {
                    id_promo: item.id,
                    id_section: item.id_section,
                    results: this.results
            }).then((response) => {
                if(response.data===1){
                  alert("Richiesta inoltrata correttamente. Ti chiameremo al più presto.")
                }else{
                  console.log(response.data)
                  alert("Qualcosa è andato storto. Contatta il webmaster");
                }
            }).catch((error) => {
               alert("Qualcosa è andato storto. Contatta il webmaster");
               console.log(error.response)
            })
             }
         },
}
</script>
