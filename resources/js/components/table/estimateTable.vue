<template>
    <div class="card" style="margin-left:10px;margin-right:10px;">
        <div style="margin:20px;">            
            <div class="d-flex">
                <input
                    type="search"
                    class="form-control"
                    placeholder="Cerca per cognome"
                    v-model="search"
                />
            </div>
        </div>



        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Cognome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Codice Fiscale
                        </th>
                        <th>
                            P.Iva
                        </th>
                        <th>
                            Promo Richiesta
                        </th>
                        <th>
                            Created At
                        </th>

                        <th>Action</th>
                    </tr>

                    <tr v-for="(estimate,index) in filteredList" :key="estimate.id">
   
                        <td>{{ estimate.name }}</td>
                        <td>{{ estimate.surname }}</td>
                        <td>{{ estimate.email }}</td>
                        <td>{{ estimate.cf }}</td>
                        <td>{{ estimate.iva }}</td>
                        <td>{{ estimate.name_promo }}</td>
                        <td>{{ estimate.created_at }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" v-on:click="deleteEstimate(estimate.id,index)">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6 offset-5">
                <pagination :data="listEstimate" @pagination-change-page="getList"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            list:[],
            listEstimate: {},
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
            axios.get('/admin/getEstimateRequest?page='+ page + '&paginate=' + this.paginate)
            .then(response => {
                this.listEstimate = response.data;
                this.list=response.data.data;
            });
        },
        deleteEstimate(id,index){
            
           axios.get('/admin/deleteAnswer/id='+ id)
            .then(response => {
                if(response.data===1){
                    alert("Richiesta eliminata correttamente")
                    this.list.splice(1,index)
                }else{
                    alert("Qualcosa è andato storto.")
                    console.log(response.data)
                }
            });

        }
    },
    mounted(){
        this.getList();
    },
    computed: {
    filteredList() {
      return this.list.filter(estimate => {
        return estimate.surname.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  }
};
</script>