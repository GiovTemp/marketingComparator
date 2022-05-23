<template>
    <div class="container">
        <pagination :data="listEstimate" @pagination-change-page="getList"></pagination>

        <premium-box v-if="premium!==null" :results="results" v-bind:item="premium"></premium-box>

        <box v-for="product in listPromos " :key="product.id" :results="results" v-bind:item="product"></box>
    </div>
</template>

<script>
import Box from './Box.vue';

export default {
  components: { Box },
props:[
        'listdata','results','premium'
    ],
    data(){
        return {
            listPromos: {},
            paginate : 10,
            search: '',
        }
    },
    watch:{
        paginate: function(value){
            this.getList();
        }
    },
    methods: {
        getList(page = 1){
            axios.get('/getPromos?page='+ page + '&paginate=' + this.paginate +'&list'+this.listdata)
            .then(response => {
                if(response.data!==0){

                    this.listPromos = response.data;
                }else{
                    console.log(this.listdata)
                    console.log(response.data)
                    alert("Qualcosa è andato storto");
                }
            });
        }
    },
     mounted(){
        this.getList();
    },

}
</script>
