<template>
    <div class="card top-line" style="margin-top: 30%!important;">
    <div class="container-fluid" style="padding: 30px;">
        <h2 style="text-align:center">Filtri ricerca</h2>
        <div class="row" style="margin-top:10%">
            <div class="col-lg-6"><div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('sortAsc')"><label>Prezzo Crescente</label></div></div>
            <div class="col-lg-6"><div class="form-check"><input type="checkbox" class="option-input checkbox"  v-on:click="$emit('sortDesc')"><label>Prezzo Decrescente</label></div></div>
        </div>
        <div class="row" style="margin-top:10%; margin-bottom:10%">
            <div class="col-lg-4"><div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('handleFilter',1)"><label>Tag1</label></div></div>
            <div class="col-lg-4"><div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('handleFilter',2)"><label>Tag2</label></div></div>
            <div class="col-lg-4"><div class="form-check"><input type="checkbox" class="option-input checkbox" v-on:click="$emit('handleFilter',3)"><label>Tag3</label></div></div>
        </div>
    </div>
</div>
</template>

