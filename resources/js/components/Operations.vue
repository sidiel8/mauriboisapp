<template>
    <div>
<div class="card text-center">
 
  <div class="card-body">
    <h4 class="card-title">OPERATIONS </h4>
    
         <div >
             
    <form  @submit="recherche" >
          <b style="float:left">Recherche Des Client</b><br>
    <div class="row">
      
    <div class="form-group col-md-4">
    <input type="number"  min="0"  class="form-control"  placeholder="N° Telephone"  v-model="phone" required>
    </div>
    </div>


     <div class="row">
    <div class="form-group col-md-4 ">
    <button  class="btn btn-success btn-block "><span > OK</span><span></span></button>
    </div>
    </div>  
        </form>  
     </div>  
 


</div>

<ul class="list-group" >
   <div v-if="loading">
     <i class="fas fa-spinner fa-spin"></i>
   </div>
   <div v-else>
         <div v-if="clients.length==0">
    <span class="alert alert-danger "> {{resultat}} </span>
   </div>
 <div v-else>
     <li   v-for="client in clients"  :id="client.id" class="list-group-item d-flex justify-content-between align-items-center">
   {{client.name}}
    <span  @click="suppClient(client.id)" style="color:red ">Supprimer</span>
    
  </li>
 </div>
   </div>
 
</ul>
    </div>    
  </div> 
</template>
<script>

export default {

      data () {
    return {
      clients:{} ,
      loading: false,
      errored: false ,
      phone:'',
      resultat:'Ce Client N\'existe Pas ',
     
     
    }
      },

    methods: {
    suppClient($id){
          
this.$dialog.confirm("êtes-vous sûr de vouloir supprimer ce client ? ", {
        
         })
	       .then((dialog) => {
            axios
      .get('/deleteclient/'+$id)
      .then(response => {
        console.log(response);
         $('#'+$id).hide(500);
        //this.del = false 
       
      
      }).finally(() => {}
       
        )


           })
    .catch(() => {
        // Triggered when cancel button is clicked

        console.log('Delete aborted');
    });
    },





    recherche(e){
         
                this.loading= true ;
               // e.disabled;
        axios.get('/clienttoedit/'+this.phone, {
                   
               }).then(response => this.clients=response.data

            
               
               
                ).catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

    }


    }






      }


</script>