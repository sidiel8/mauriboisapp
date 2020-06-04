<template>
 <div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                </div>   
                  
                <div class="col-md-3 navbar float-right">
                    
                    
                    
                </div>
            </div>
                
                   
            <div  class="card">
                <div class="">
                    <nav class="navbar navbar-light bg-light">
                       
                       
                        <b class="navbar-brand">Factures</b>
                       
                        
                        
                        <form class="form-inline">
                          <input class="form-control mr-sm-2" v-model="search" type="search" placeholder="Search" aria-label="Search">
                        </form>
                      </nav>
                    
                    </div>
                  <div v-if="loading" >
                           <loading></loading>
                       </div> 
                 <div v-else class="card-body">
                  <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          
                          <th scope="col">Numero Facture <i class="fas fa-search"></i></th>
                          <th scope="col">Monatant Devis</th>
                          <th scope="col">Nom </th>
                          <th scope="col">Telephone</th>
                          
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         
                         
                          <tr class="alert alert-success" v-for="devis in filteredDevis" :key="devis.id" :id="devis.id" >
                            
                             <td scope="row"  ><b>{{devis.numero_facture}}</b></td>
                            <td scope="row"> {{devis.montant_devis}}</td>
                            <td scope="row"><b>{{devis.client.name}}</b></td>
                            <td scope="row"><b>{{devis.client.numero}}</b></td>
                            <td scope="row" > <button :id="'btn'+devis.id" type="submit" class="btn btn-sm btn-danger" @click="deleteItem(devis.id)">
                               <i class="fas fa-trash-alt" ></i>
                              
                              </button></td>


                          
                            
                      
                            
                           
                             
                        
                       </tr>
                      </tbody>
                    </table> 
                 </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
  export default {
      data () {
    return {
      devis:{} ,
      loading: true,
      errored: false ,
      del:false ,
      search:''
    }
  },
  created () {
    axios
      .get('/devis/fac')
      .then(response => (this.devis = response.data))
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)

  } ,

  methods:{
      deleteItem($id){
          this.$dialog.confirm("êtes-vous sûr de vouloir supprimer ce devis ? ", {
         loader: true 
         })
	       .then((dialog) => {
        $('#btn'+$id).html('<i class="fas fa-circle-notch fa-spin"></i>');
        
          axios
      .delete('/devis/'+$id)
      .then(response => {
        console.log(response);
         $('#'+$id).hide(500);
        this.del = false 
       
      
      }).finally(() => {}
       
        )
        setTimeout(() => {
			console.log('Delete action completed ');
			dialog.close();
		}, );

	})
    .catch(() => {
        // Triggered when cancel button is clicked

        console.log('Delete aborted');
    });

    }

  } ,
  computed:{
       filteredDevis: function() {
   if(this.search==''){
        return this.devis ;
   }else{
      var sss = this.devis ;
    return  sss.filter((d)=>{
              
           return d.numero_facture.toString().match(this.search);
                
    }
    );
   }
  }

 }
  }
</script>