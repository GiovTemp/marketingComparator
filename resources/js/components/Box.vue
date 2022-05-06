<template>
     <div class="row" style="margin-top:20px;">
        <div class="col-lg-12">
            <div class="card bottom-line" style="width: 100%;">          
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="img-fluid" :src="'../images/'+item.image"  alt="Card image cap">
                            </div>
                            <div class="col-lg-8">
                                <div class="container-fluid">
                                    <h3 class="card-title" style="text-align: center;">{{item.title}}</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-8">

                                            <p class="card-text">{{item.description}}</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card promo-action-card left-line">          
                                                <div class="card-body">
                                                    <h2 class="card-title" style="text-align: center;">{{item.total}} €</h2><br>
                                                    <button class="btn btn-primary" v-on:click=prova(item.id)>Ti chiamiamo noi</button>
                                                    <br><br>
                                                    <button class="btn btn-success" v-on:click=prova(item.id)>Richiedi preventivo</button>
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
    props:['item'],
}
</script>
