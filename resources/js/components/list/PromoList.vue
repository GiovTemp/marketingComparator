<template>
    <div class="container">
        <v-page
        :total-row="arr.length"
        align="left"
        v-model="current"
        @page-change="pagePhotoChange"
        :page-size-menu="[5, 10]"
        ></v-page>

        <premium-box v-if="premium!==null" :results="results" v-bind:item="premium"></premium-box>

        <box v-for="product in pageArr " :key="product.id" :results="results" v-bind:item="product"></box>
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
      pageArr: [],
      current: 0,
    arr: [     
      ],
    };
  },
  methods: {
    pagePhotoChange(pInfo) {
      this.pageArr.splice(0, this.pageArr.length);
      let start = 0,
        end = 0;
      start = pInfo.pageSize * (pInfo.pageNumber - 1);
      end = start + pInfo.pageSize;
      if (end > this.arr.length) end = this.arr.length;
      for (let i = start; i < end; i++) {
        this.pageArr.push(this.arr[i]);
      }
      console.log(this.arr);
    },
  },
  beforeUpdate () {
   // console.log(this.listdata[0]);
    this.arr=this.listdata;
          this.pageArr.splice(0, this.pageArr.length);
      let start = 0,
        end = 0;
      start = 0;
      end = start + 5;
      if (end > this.arr.length) end = this.arr.length;
      for (let i = start; i < end; i++) {
        this.pageArr.push(this.arr[i]);
      }
  }
}



</script>


