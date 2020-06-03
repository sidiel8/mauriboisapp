<template>
    <div>
        
       
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Croquis </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="turnSuccOff" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                        <div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
      Un Noveau <strong> Croquis </strong> 
 a été ajouté(e) avec succès .
     <br>
    <strong> Félicitaions  <i class="fas fa-smile"></i> </strong>
  
</div>
      <div v-else  class="modal-body">
      <p> Client : {{m_info.clientName }}</p>
        <div v-if="m_info.confirmations.length==0"  class="alert alert-danger">
                 IMPOSIIBLE D'AJOUTER UN CROQUIS 
          </div>
          <div v-else>
        <form  enctype="multipart/form-data" >
          <div class="form-group">
            
            <label for="recipient-name" class="col-form-label"><b>Designer</b> :</label>
            <select class="custom-select custom-select-sm" v-model="designer" name="designer">
  <option selected value="" >Choisir Un Designer</option>
  <option value="Dacio">Dacio</option>
  <option value="Martin">Martin</option>
  <option value="Teowin">Teowin</option>
</select>
 <br>
 <b>Croquis</b> :
<input type="file" class="form-control" v-on:change="onImageChange"  accept="image/x-png,image/gif,image/jpeg , application/pdf">

<span class="text-danger" v-text="errors.get('designer')" ></span>
          </div>
          <div class="form-group">
           
            <label for="message-text" class="col-form-label"><b>Observaions</b> :</label>
            <textarea minlength="5" maxlength="50" class="form-control" id="message-text"  name="designation" v-model="designation" required></textarea>
            <span class="text-danger" v-text="errors.get('designation')" ></span>
          </div>
        </form>

          <div class="modal-footer">
        
        <button type="" class="btn btn-primary" @click="addCroquis">
          <span v-if="!loader">Ajouter</span>
          <span v-else><i class="fas fa-spinner fa-spin"></i></span>
          </button>
      </div>
        </div>
      </div>
    
    </div>
  </div>
</div>


    </div>    
</template>

<script>
  class Errors {
       constructor(){
         this.errors = {};
       } 
       get(field){
         if(this.errors[field]){
             return  this.errors[field][0];
         }
       }
       record(errors){
         this.errors = errors ;
       }
       clear(field){
          delete this.errors[field][0] ;
       }
     }
export default {
  
  data(){
    return{
          mesure_id:'',
          designer:'',
          designation:'' ,
          client_id:'' ,
          loader:false ,
          errors: new Errors(),
          success: false ,
          mesure:{},
          image:'',
          success:'',
          
    }
  },
  props:{
    m_info:Object
  },
  methods:{
    onImageChange(e){

                console.log(e.target.files[0]);

                this.image = e.target.files[0];

            }, 

      addCroquis(e) { 
                    console.log('clickkke add croquis');
                e.preventDefault();
                

                let currentObj = this;

 

                const config = {

                    headers: { 'content-type': 'multipart/form-data' }

                }
                this.loader= true ;
                e.disabled;
               let formData = new FormData();

                formData.append('image', this.image);
                formData.append('designer', this.designer);
                formData.append('designation', this.designation);
                formData.append('mesure_id', this.m_info.mesure_id,);
                formData.append('client_id', this.m_info.clientId);
                formData.append('client_name', this.m_info.clientName);
               
               axios.post('/croquis',formData,
                 config  )
                .then(response =>
                    
                    {this.success=true ,
                      this.loader=false,
                       this.designer="" ,
                 this.designation=""
                    }
                  ).catch(error =>{ 
                    this.errors.record(error.response.data['errors']),
                    this.loader=false
                    
                    })
                  .finally(()=>{
                  
                  })
      }   ,  
                  
                 turnSuccOff() {
                   this.success=false ;
                    this.designer="" ;
                 this.designation="";
                    this.loader=false ;
                    this.errors= new Errors();
                    
                 }  ,
                
  }
}
</script>