<template>
    <div class="card top-line" style="margin-top: 30%!important;">
    <div class="container-fluid">
            <div class="row" id="fs_app">
                
                <section class="col-12" id="fs_service">
                    <div class="row">
                        <div class="col-12" >
                            <h4 style="text-align:center">Riepilogo Servizi Selezionati</h4>
                            <br>
                            <p class="card-text" v-for="s in summary" :key="s.id">
                                <b>{{s.title}}</b>
                                {{s.answer}}
                            </p>
                        </div>
                    </div>
                </section>
                <section class="col-12" id="fs_header_bar">
                    <div class="row">
                        <div class="col-12" id="fs_page_title">
                          <h4 style="text-align:center">Filtri ricerca</h4>
                        </div>
                    </div>
                </section>

                <section class="col-12" id="fs_price_body">
                    <div>
                        <span class="heading">
                            Ordina
                        </span>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn2" type="button"  v-on:click="$emit('sortAsc')">Prezzo Crescente <font-awesome-icon icon="fa-solid fa-up-long" /></button>
                            </div>
                            <div class="col-6">
                                <button class="btn2" type="button" v-on:click="$emit('sortDesc')">Prezzo Decrescente <font-awesome-icon icon="fa-solid fa-down-long" /></button>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="col-12" id="fs_distance_body">
                    <span class="heading">
                       Categoria
                    </span>
                    <div class="contents">
                       
                        <div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('handleFilter',1)"><label>Tag1</label></div>
                            
                        <div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('handleFilter',2)"><label>Tag2</label></div>
                            
                        <div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('handleFilter',3)"><label>Tag3</label></div>
                            
                        
                    </div>
                </section>



            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['summary'],
}
</script>
