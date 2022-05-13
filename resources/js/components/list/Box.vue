<template>
     <div class="row" style="margin-top:20px;">
        <div class="col-lg-12">
            <div class="card bottom-line" style="width: 100%;">          
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="img-fluid" :src="item.image"  alt="Card image cap">
                            </div>
                            <div class="col-lg-8">
                                <div class="container-fluid">
                                    <h3 class="card-title" style="text-align: center;">{{item.title}}</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-7">

                                            <p class="card-text">{{item.description}}</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card promo-action-card left-line">          
                                                <div class="card-body">
                                                    <h2 class="card-title" style="text-align: center;">{{item.total}} €</h2><br>
                                                    <button class="btn btn-primary" v-on:click="requestCall(item)">Ti chiamiamo noi</button>
                                                    <br><br>
                                                    <button class="btn btn-success" v-on:click="prova(item.id)">Richiedi preventivo</button>
                                                    <br><br>
                                                </div>
                                            </div>                                                        

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="alert alert-info" role="alert" v-if="item.promoMessage!==null">
                                    {{item.promoMessage}}
                                </div>
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
