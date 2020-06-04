<template>

 <div class="">
   
    <div class="row justify-content-center">
        <div class="col-md-12">


          
            <div  class="card">
                <div class="navbar-light bg-light p-2">
                   <div class="row">
                    
         <div class="col-md-8"> 
            <b> Liste Decharge </b>
          </div>
          <div class="col-md-4"><new-decharge class="float-right" @decharge="refresh" ></new-decharge></div>
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
                           <loading ></loading>
                       </div> 

                 <div v-else class="card-body">
  
   <input class="form-control mr-sm-2 mb-2" type="search" v-model="search"
  
    placeholder="Search" aria-label="Search">
   
 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  
  <thead>
    <tr>
      <th class="th-sm">N° Facture <i class="fas fa-search"></i>
      </th>
      <th class="th-sm">Prenom Client
      </th>
      <th class="th-sm">Telephone
      </th>
      <th class="th-sm">Vendeur
      </th>
      <th class="th-sm">Date De Decharge</th>
    
    
    </tr>
  </thead>
  <tbody>
    <tr v-for="decharge in filteredDecharge" :key="decharge.id">
      <td>{{decharge.numero_facture}}</td>
      <td>{{decharge.client.name}}</td>
      <td>{{decharge.client.numero}}</td>
      <td>{{decharge.user_id}}</td>
      <td>{{  moment(decharge.date_decharge).locale('fr').format('LL')}}</td>
     
   
    </tr>
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
         errored:false ,
         loading:true,
         search:'',
         decharges:{},
         moment:moment,
         search:''
    }
  },
   created () {
    axios
      .get('/decharges')
      .then(response => {
        this.decharges = response.data;
        console.log('you will get all decharges');
      })
      .catch(error => {
        console.log(error)
        this.errored = true 
             

      })
      .finally(() => this.loading = false)
    
  },
  computed: {

     filteredDecharge: function() {

   if(this.search==''){
        return this.decharges ;
   }else{
      var sss = this.decharges ;
    return  sss.filter((d)=>{
              
           return d.numero_facture.toString().match(this.search);
                
    }
    );
   }
    

}


},

methods: {
  
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('/clients?page=' + page)
				.then(response => this.clients = response.data);
    } ,
    refresh(decharges){
            this.decharges = decharges
    } , 

     // get all facture
     
   
  } ,
  



  }

</script>
