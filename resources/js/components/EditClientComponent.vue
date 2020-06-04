<template>
    <div>
         
         <div class="modal fade" id="editModalLong" tabindex="-1" role="dialog" aria-labelledby="editModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="editModalLongTitle">Editer Client
           
           </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="turnSuccOff">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div v-if="err" class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong> Verifiez LEs INFO.  <i class="fas fa-smile" style="color:orange"></i> 
     </strong>
     </div>
     <div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
     <strong> Informations Editées avec succès .  <i class="fas fa-smile" style="color:orange"></i> 
     </strong>
     </div>
      <div v-else class="modal-body">
        <div v-if="clientToEdit.loading" style="
    text-align: center;
    font-size: 30px;" >
           <i class="fas fa-spinner fa-pulse"></i>
        </div>
        <div v-else>
          <form   >
               <div class="row">
                 <div class="col-md-12">
                    <div class="form-group row">
                 
                        <div class="col-md-12">
                          <input id="name" type="text" v-model="clientToEdit.client.name" class="form-control" required placeholder="Nom"  autocomplete="off">
                            <span   ></span>
                        </div>
                        </div>
          
                        <div class="form-group row">
                        <div class="col-md-12">
                         <input id="numero" type="number" v-model="clientToEdit.client.numero"  class="form-control "  required placeholder="numero" autocomplete="off" >
                         
                         </div>
                         </div>
                         <div class="form-group row">
                        <div class="col-md-12">
                         <input id="email" type="email" v-model="clientToEdit.client.email"  class="form-control "   placeholder="Email" autocomplete="off" >
                         
                         </div>
                         </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                              <input id="quartier" type="text" class="form-control"  v-model="clientToEdit.client.quartier" required placeholder="Quartier" autocomplete="off">
                              <span class="invalid-feedback" role="alert">
                              </span>
                                       
                            </div>
                        </div>

                         
          
                                
                       
          
          
                             
                 </div>
 

</div>  
<div class="row">
          <div class="form-group col-md-12  mb-0">
                                    <div class=" ">
                           <button  class="btn btn-success btn-block" @click="update"   >
                                          <span v-if="!loader">Editer</span> <span v-else><i class="fas fa-spinner fa-spin"></i></span>
                                        </button>
                                    </div>
</div>                      
</div>
          </form>

        </div>
      </div>
   </div> 
    </div>
  </div>
</div>





    </div>
</template>

<script>
export default {
   data(){
    return {
       loader: false,
     success:false ,
     err:false ,
    } 
   },
    props:{
      clientToEdit:Object
    } ,

    methods:{
      update(e){
        this.loader=true ;
         e.preventDefault();
         console.log('update clicked')
        axios.patch('/clients/edit/'+ this.clientToEdit.client.id , 
          {
            name:this.clientToEdit.client.name ,
            numero:this.clientToEdit.client.numero,
            email:this.clientToEdit.client.email,
            quartier:this.clientToEdit.client.quartier,
          }
        ).then(response => {
          this.$emit('client-updated' , response) , this.loader=false , this.success =true
           })
        .catch(error => {this.err=true , this.loader=false}) 
      
      } ,
      turnSuccOff(){
                   this.success=false ;
                   this.clientToEdit.loading=true ;
                 }  ,
    }
  
}
</script>