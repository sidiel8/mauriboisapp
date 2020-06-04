<template>
    <div>
         
         <div class="modal fade" id="factureModalLong" tabindex="-1" role="dialog" aria-labelledby="factureModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="factureModalLongTitle"> <b> {{allFacture.clientName}} </b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="turnOffLoad" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
    
      <div class="modal-body">
              <form  @submit="addF">
                <input type="hidden"  name="cl"  v-model="allFacture.clientId" />
                <div class="form-row">
                      <div class="form-row">
    <div class="form-group col-md-3">
   
      <input type="number"  min="0"  class="form-control" v-model="numero_facture"  placeholder="N° facture" required>
       <span class="text-danger" v-text="errors.get('numero_facture')" ></span>
    </div>
    <div class="form-group col-md-3">
   
      <input type="number" min="0" class="form-control"  v-model="montant_facture" placeholder="Montant facture" required>
       <span class="text-danger" v-text="errors.get('montant_facture')" ></span>
    </div>
    <div class="form-group col-md-3">
      
      <select  class="form-control" v-model="user_id"  required>
        <option selected value="">Venduer...</option>
         <option value="01">01</option>
         <option value="02">02</option>
         <option value="03">03</option>
         <option value="04">04</option>
         <option value="05">05</option>
         <option value="05">06</option>
         <option value="11">Reclamation</option>
      </select>
       <span class="text-danger" v-text="errors.get('user_id')" ></span>
    </div>
   
   
    <div class="form-group col-md-3">
    <button type="submit" class="btn btn-dark"><span v-if="!loader"> Ajouter</span><span v-else><i class="fas fa-spinner fa-spin"></i></span></button>
    </div>
   
    </div>
       <span class="text-danger" v-text="errors.get('numero_facture')" ></span>
  </div>
    <hr>
  
</form>
              <div v-if="allFacture.loading" style="
                           text-align: center;
                           font-size: 30px;" >
                           <i class="fas fa-spinner fa-pulse"></i>
                           </div>
               <div v-else class="row" >
                 <div class="col-md-12">
 <div class="form-group col-md-12">
        <div  v-if="allFacture.factures.length==0" class="alert alert-danger" role="alert">
                   <h4 class="alert-heading center">0 facture ! </h4>
                   
                   <hr>
     </div>               
<div v-else>
    <b>Listes Des facture</b>          
<ul class="list-group">
  <li class="list-group-item" v-for="facture in allFacture.factures" :key="facture.id">
  <span class="float-left"><i class="fas fa-hand-holding-usd  mx-4" style="color:red"></i> N° : {{facture.numero_facture}}</span>
  <span class="float-right">Montant : {{facture.montant_facture}}</span>
  </li>
</ul>
</div>
</div>
          
                       
          
                      

                         
          
                                
                       
          
          
                             
                 </div>
 

</div>  
<div class="row">
          <div class="form-group col-md-12  mb-0">
                             
</div>                      
</div>
   
      </div>
   </div> 
    </div>
  </div>
</div>



</div>

 
</template>

<script>
var moment = require('moment');
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
    return {
      moment:moment ,
      numero_facture:'',
      montant_facture:'',
      user_id:'',
      client_id:'' ,
      seuccess: false ,
      loader:false ,
      errors:new Errors(),
     
     
    } 
   },
    props:{
      allFacture:Object ,
      
    } ,

    methods:{
      addF(e) { 
                  console.log('clickkke add Facture');
                e.preventDefault();
                this.loader= true ;
                e.disabled;
       
               axios.post('/facture', {
                    numero_facture:this.numero_facture,
                    montant_facture:this.montant_facture,
                    client_id:this.allFacture.clientId ,
                     user_id:this.user_id ,
                   
                   // savingSuccessful: false ,
                })
                .then(response => {
                  this.seuccess=true ;
                  this.loader=false ;
                  this.numero_facture="";
                  this.montant_facture="";
                  this.user_id="";
                  
         axios
      .get('/facture/client/'+this.allFacture.clientId)
      .then(response => {this.allFacture.factures=response.data  })
      .catch(error => {
        console.log(response)
        //this.errored = true 

      })
      .finally()
                   
                   

                }
               
                )
                .catch(error =>
                   this.errors.record(error.response.data['errors'])  
                   //console.log(error.response.data['errors'])
                ).finally(() => this.loader = false)
            } ,


            turnOffLoad() {
                  
                   this.allFacture.loading=true ;
                 }

       
    } 
  
}
</script>