<template>
    <div class="container-fluid" style="padding-left:4vw;padding-right:4vw">
                <div class="row">
                <h1 style="text-align:center">Offerte Disponibili</h1>
                    <div class="col-md-4">
                        <filters @handleFilter="handleFilter" @sortAsc="sortAsc" @sortDesc="sortDesc"></filters>
         
                    </div>
                    <div class="col-md-8">    
                        <promo-list :listdata="products" :results="results"></promo-list>       
                    </div>      
                </div>
            </div>
</template>

<script>
import Filters from './Filters.vue'
import PromoList from './PromoList.vue'
export default {

    components: {
        Filters,
        PromoList
      },
    props: ['promos','imgSrc','results'],
      mounted() {
          this.state.products=this.promos;
          this.products=this.promos;
      },

    data: () => ({
        state :{
                products:[],
                    tag1:false,
                    tag2:false,
                    tag3:false,
                    order:null
                },
                products: [                   
                ]
            
    }),
     methods:{
            handleFilter(id){
                switch(id){
                    case(1):
                        this.state.tag1=!this.state.tag1;
                        break
                    case(2):
                        this.state.tag2=!this.state.tag2;
                        break
                    case(3):
                        this.state.tag3=!this.state.tag3;
                        break
                }

                this.filter()
                    
            },
            handleOrder(){
                switch(this.state.order){
                    case(1):
                        this.sortAsc();
                        break
                    case(2):
                        this.sortDesc();
                        break
                }
            },
            filter(){
                
                var i;
                this.products = [];
                i=0;
                var flag;

                if(this.state.tag1===false&&this.state.tag2===false&&this.state.tag3===false){
                    this.products = this.state.products;
                }else{
                    while(i<this.state.products.length){
                        flag=false;
    
                        if(this.state.tag1===true){
                            if(this.state.products[i].tag1===true){
                                this.products.push(this.state.products[i]);
                                flag=true;
                            }
                        }
    
                        if(this.state.tag2===true && flag===false){
                            if(this.state.products[i].tag2===true){
                                this.products.push(this.state.products[i]);
                                flag=true;
                            }
                        }
    
                        if(this.state.tag3===true && flag===false){
                            if(this.state.products[i].tag3===true){
                                this.products.push(this.state.products[i]);
                                flag=true;
                            }
                        }
    
                        i++;
    
                    }  
                }
                if(this.state.order===1){
                    this.sortAsc();
                }else if(this.state.order===2){
                    this.sortDesc();
                }
               
                
            },
            sortAsc(){
                this.state.order=1;
                this.products=this.products.sort((a,b)=>a.total>b.total ? 1 : -1);
            },
            sortDesc(){
                this.state.order=2;
                this.products=this.products.sort((a,b)=>a.total<b.total ? 1 : -1);
            }   
        },
}
</script>




