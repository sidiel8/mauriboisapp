<template>

 <div class="">
   <all-mesure  v-bind:all="all"  ></all-mesure>
   <all-croquis  v-bind:allCroquis="allCroquis"  ></all-croquis>
   <all-devis  v-bind:allDevis="allDevis"></all-devis>
   <all-factures v-bind:allFacture="allFacture"></all-factures>
    <div class="row justify-content-center">
        <div class="col-md-12">
              

          
            <div  class="card">
                <div class="navbar-light bg-light p-2">
                   <div class="row">
         <div class="col-md-8"> <pagination :data="clients" @pagination-change-page="getResults" class=""></pagination>
          </div>
          <div class="col-md-4">
            <new-client class="float-right" @client-added="refresh" >
            </new-client>
            </div>
      </div>
                    
                    </div>
                    <section v-if="errored">
    <div  class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> 
Désolé, le serveur n'a pas pu récupérer les données </strong> 

     <br>
    <strong>  <i class="fas fa-sad-face"></i> Veuillez Actualiser la page </strong>
  
</div>
  </section>

  <section v-else >
   

                      <div v-if="loading" >
                           <loading></loading>
                       </div> 

                 <div v-else class="card-body">
             <div v-if="resultCount==0">
                                 <div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">0 Client !</h4>
  <p> Veuillez Ajouter Des Clients 
    .</p>
  <hr>
</div>
  </div>
   <input class="form-control mr-sm-2 mb-2" type="search" v-model="search"
  
    placeholder="Search" aria-label="Search">
  
 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  
  <thead>
    
    <tr>
      <th class="th-sm">Nom
      </th>
      <th class="th-sm">Télephone  <i class="fas fa-search"></i>
      </th>
      <th class="th-sm">Email  
      </th>
      <th class="th-sm">Vendeur
      </th>
      <th class="th-sm">Quartier <i class="fas fa-location" ></i>
      </th>
      <th class="th-sm">Date D' Enregistrement
      </th>
      <th class="th-sm"> Options 
      </th>
    
    </tr>
  </thead>
  <tbody>
    <tr v-for="client in filteredClients" :key="client.id">
      <td >{{client.name}}</td>
      <td>{{client.numero}}</td>
      <td>{{client.email ?  client.email :  '--------------' }}</td>
      <td>{{client.vendeur}}</td>
      <td>{{client.quartier}}</td>
      <td>{{
            moment(client.created_at).locale('fr').format('LL')
        }}</td>
      <td>
        
        <button  @click="getM(client.id , client.name)" type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#mesureModalLong"><b></b><i class="fas fa-ruler-horizontal" style="color:red"></i></button>
        <button @click="getC(client.id ,client.name)" type="button" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#croquisModalLong"><i class="fas fa-drafting-compass" style="color:white"></i></button>
        <button @click="getD(client.id , client.name)" type="button" class="btn btn-dark btn-sm mb-1" data-toggle="modal" data-target="#devisModalLong"><i class="fas fa-file-invoice-dollar" style="color:white"></i></button>
         <!--<button @click="getF(client.id , client.name)" type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#factureModalLong"><i class="fas fa-hand-holding-usd" style="color:white"></i></button>
       <button @click="getClient(client.id)" type="button" class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#statuModalLong">Statut</button>-->
        <button @click="getClient(client.id)" type="button" class="btn btn-sm btn-info  mb-1" data-toggle="modal" data-target="#editModalLong"><i class="fas fa-edit "> </i>  </button>

        </td>
     
    </tr>
    <edit-client v-bind:clientToEdit="clientToEdit" @client-updated="refresh" ></edit-client>
    <statu-client v-bind:clientToEdit="clientToEdit"  ></statu-client>
    
    </tbody>
</table>
                 </div>

  </section>  

            </div>
        </div>
    </div>
</div>
</template>



<script>
  var moment = require('moment');
     
  export default {
   
      data () {
    return {
      clients:{} ,
      loading: true,
      errored: false ,
      search:'' ,
      moment:moment,
      
      clientToEdit: {
        loading: true ,
        client:{}
      },

      all:{
        mesures:[],
        load:true ,
        clientName:'',
        clientId:'',
        
      },
       allCroquis:{
        croquis:[],
        load:true ,
        clientName:'',
        clientId:'',
        
      },
       allDevis:{
        devis:{},
        factures: {},
        loading:true ,
        clientName:'',
        clientId:'',
        
      },
      allFacture:{
        factures:[],
         loading:true ,
        clientName:'',
        clientId:'',
        
      },
    }
  },
  created () {
    axios
      .get('/clients')
      .then(response => {
        this.clients = response.data;
        console.log('client' + this.clients);
      })
      .catch(error => {
        console.log(error)
        this.errored = true 
             

      })
      .finally(() => this.loading = false)
    
  },
  computed: {
  resultCount() {
    return this.clients && this.clients.length
  } ,
  filteredClients: function() {

   if(this.search==''){
        return this.clients.data ;
   }else{
      var sss = this.clients.data ;
    return  sss.filter((cli)=>{
              
           return cli.numero.toString().match(this.search);
                
    }
    );
   }
    

}
},

methods: {
  printInvoice(){ 

        window.print()

      },
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('/clients?page=' + page)
				.then(response => this.clients = response.data);
    } ,
    refresh(clients){
            this.clients = clients.data 
    } , 
  // get client to  edit
    getClient(id){
           axios.get('/clients/edit/'+ id)
           .then(response =>{
             this.clientToEdit.client=response.data ;
              this.clientToEdit.loading=false ;
             } )
           .catch(error => console.log(error))
           
    } ,
  //get all Mesures
   getM(id , name){
         axios
      .get('/mesures/client/'+id)
      .then(response => {this.all.mesures=response.data ,this.all.clientId=id ,this.all.clientName=name })
      .catch(error => {
        console.log('get mesure')
        console.log(response)
        //this.errored = true 

      })
      .finally(() => this.all.load = false)
     } ,

    // get all croquis
      getC(id , name){
         axios
      .get('/croquis/client/'+id)
      .then(response => {this.allCroquis.croquis=response.data ,this.allCroquis.clientId=id ,this.allCroquis.clientName=name })
      .catch(error => {
        console.log(response)
        //this.errored = true 

      })
      .finally(() => this.allCroquis.load = false)
     } ,
  // get all Devis
   getD(id , name){
         axios
      .get('/devis/client/'+id)
      .then(response => {this.allDevis.devis=response.data.devis ,  this.allDevis.factures=response.data.factures ,this.allDevis.clientId=id ,this.allDevis.clientName=name })
      .catch(error => {
        console.log(response)
        //this.errored = true 

      })
      .finally(() => this.allDevis.loading = false)
     },

     // get all facture
      getF(id , name){
         axios
      .get('/facture/client/'+id)
      .then(response => {this.allFacture.factures=response.data ,this.allFacture.clientId=id ,this.allFacture.clientName=name })
      .catch(error => {
        console.log(response)
        //this.errored = true 

      })
      .finally(() => this.allFacture.loading = false)
     }
   
  } ,
  



  }

</script>
