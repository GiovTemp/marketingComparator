<template>
    <div class="container">
        <box v-for="product in listdata " :key="product.id" :results="results" v-bind:item="product"></box>
    </div>
</template>

<script>
import Box from './Box.vue'
export default {
  components: { Box },
props:[
        'listdata','results'
    ],
}
</script>
