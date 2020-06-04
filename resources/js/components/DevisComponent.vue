<template>
    <div>
         
         <div class="modal fade" id="devisModalLong" tabindex="-1" role="dialog" aria-labelledby="devisModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="devisModalLongTitle"> <b> {{allDevis.clientName}} </b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  @click="turnOffLoad">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
    
      <div class="modal-body">
              <form  @submit="addD">
                <input type="hidden"  name="cl"  v-model="allDevis.clientId" />
                <div class="form-row">
                      <div class="form-row">
    <div class="form-group col-md-3">
   
      <input type="number"  min="0"  class="form-control" v-model="numero_devis"  placeholder="N° Devis" @keydown="errors.clear('numero_devis')">
       <span class="text-danger" v-text="errors.get('numero_devis')" ></span>
    </div>
    <div class="form-group col-md-3">
   
      <input type="number" min="0" class="form-control"  v-model="montant_devis" placeholder="Montant Devis" @keydown="errors.clear('montant_devis')">
       <span class="text-danger" v-text="errors.get('montant_devis')" ></span>
    </div>
    <div class="form-group col-md-3">
      
      <select  class="form-control" v-model="user_id"  @change="errors.clear('user_id')">
        <option selected value="">Venduer...</option>
        <option v-for="user in users" :key="user.id" :value="user.nv">{{ '(' + user.nv +' )' +' '+ user.name}}</option>

      </select>
       <span class="text-danger" v-text="errors.get('user_id')" ></span>
    </div>
    
  
    <div class="form-group col-md-3">
    <button type="submit" class="btn btn-dark"><span v-if="!loader"> Ajouter</span><span v-else><i class="fas fa-spinner fa-spin"></i></span></button>
    </div>
    </div>
 
  </div>
    <hr>
  
</form>
        
            <div v-if="allDevis.loading" style="
                           text-align: center;
                           font-size: 30px;" >
                           <i class="fas fa-spinner fa-pulse"></i>
                           </div>
       
               <div v-else class="row" >
                 <div class="col-md-12">
 <div class="form-group col-md-12">
        <div  v-if="allDevis.devis.length==0 &&  allDevis.factures.length==0" class="alert alert-danger" role="alert">
                   <h4 class="alert-heading center">0 Devis ! </h4>
                   
                   <hr>
     </div>               
<div v-else>
           <div v-if="invoiceOn">
             <p>Voulez Vous Facturer le Devis numero {{n_d}} ? </p>
        <form @submit="addFacture">
        <div class="row">
    <div class="form-group col-md-12">
     <input type="number"  min="0"  class="form-control" v-model="numero_facture"  placeholder="N° facture" required>
       <span class="text-danger" v-text="errors.get('numero_facture')" ></span>
    </div>
   
        </div>
     <div class="row">
      
     <div class="form-group col-md-8">
    <button type="" class="btn btn-danger btn-block " @click="annuller"><span >Annuller</span></button>
    </div>

        <div class="form-group col-md-4 ">
    <button  class="btn btn-success btn-block "><span v-if="!loader"> OK</span><span v-else><i class="fas fa-spinner fa-spin"></i></span></button>
    </div>
     </div>  
        </form>  
     </div>  
        <div v-if="devisOn">
             <p>Voulez Vous Editer le montanat du  Devis numero {{n_d}} ? </p>
        <form @submit="editDevis">
        <div class="row">
    <div class="form-group col-md-12">
     <input type="number"  min="0"  class="form-control" v-model="montant_deviss"  placeholder="Montanat Devis" required>
       <span class="text-danger" v-text="errors.get('montant_deviss')" ></span>
    </div>
   
        </div>
     <div class="row">
      
     <div class="form-group col-md-8">
    <button type="" class="btn btn-danger btn-block " @click="annuller"><span >Annuller</span></button>
    </div>

        <div class="form-group col-md-4 ">
    <button  class="btn btn-success btn-block "><span v-if="!loader"> OK</span><span v-else><i class="fas fa-spinner fa-spin"></i></span></button>
    </div>
     </div>  
        </form>  
     </div>
      <div v-else >
    <ul   class="list-group" v-if="allDevis.devis.length!=0">
    <b>Listes Des Devis</b>  
    <li  class="list-group-item" v-for="devis in allDevis.devis" :key="devis.id">
    <div>
    <span class="float-left"><i class="fas fa-file-invoice-dollar text-black mx-4"></i> N° : {{devis.numero_devis}}</span>
    <span class="float-right">Montant : {{devis.montant_devis}}  
     <button class="btn btn-sm btn-danger" @click="showInvoiceForm(devis.numero_devis)" ><i class="fas fa-hand-holding-usd" style="color:white"></i></button> 
    <button class="btn btn-sm btn-success" @click="showDevisForm(devis.numero_devis)" ><i class="fas fa-edit" style="color:white"></i></button></span>
    
    </div>  
    </li>
    </ul>
      <div  v-if="allDevis.devis.length==0" class="alert alert-danger" role="alert">
                   <h4 class="alert-heading center">0 Devis ! </h4>
                   
                   <hr>
     </div> 

      

    <ul   class="list-group">
    <b>Listes Des Factures</b>  
    <li   class="list-group-item" v-for="fact in allDevis.factures" :key="fact.id">
    <div>
    <span class="float-left"><i class="fas fa-hand-holding-usd text-black mx-4" style="color:green"></i> N° : {{fact.numero_facture}}</span>
    <span class="float-right">Montant : {{fact.montant_devis}} </span>
    </div>  
    </li>
    </ul>

    <div  v-if="allDevis.factures.length==0" class="alert alert-danger" role="alert">
                   <h4 class="alert-heading center">0 Factures ! </h4>
                   <hr>
    </div>

      </div>
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
         if(this.errors[field]){
          delete this.errors[field][0] ;
           }
       }
     }
export default {
   
   data(){
    return {
      moment:moment ,
      numero_devis:'',
      montant_devis:'',
      montant_deviss:'',
      user_id:'',
      client_id:'' ,
      seuccess: false ,
      loader:false ,
      errors:new Errors(),
      invoiceOn:false ,
      devisOn:false ,
      n_d:'' ,
      numero_facture:'',
      users:{},
      //montant_facture:'',
    
     
    } 
   },
    props:{
      allDevis:Object ,
      
    } ,
     created () {
    axios
      .get('/users/input')
      .then(response => {
        this.users = response.data;
        console.log('users to add a' + this.users);
      })
      .catch(error => {
        console.log(error)
        this.errored = true 
             

      })
      .finally(() => this.loading = false)
    
  },

    methods:{
      addD(e) { 
                  console.log('clickkke add D');
                e.preventDefault();
                this.loader= true ;
                e.disabled;
       
               axios.post('/devis', {
                    numero_devis:this.numero_devis,
                    montant_devis:this.montant_devis,
                    client_id:this.allDevis.clientId ,
                     user_id:this.user_id ,
                   
                   // savingSuccessful: false ,
                })
                .then(response => {
                  console.log(response.data)
                  console.log('apres devis')
                  this.seuccess=true ;
                  this.loader=false ;
                 this.numero_devis="";
                  this.montant_devis="";
                  this.user_id="";
                  axios
      .get('/devis/client/'+this.allDevis.clientId)
      .then(response => {
         console.log(response.data)
                  console.log('apres facture')
        this.allDevis.devis=response.data.devis ;
        this.allDevis.factures=response.data.factures  ;
        })
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
                  
                   this.allDevis.load=true ;
                   this.invoiceOn=false ;
                   this.errors = new Errors;
                   this.numero_devis="";
                   this.montant_devis="";
                   this.user_id="";

                   
                 } ,
      showInvoiceForm($nd){
        this.invoiceOn = true ;
        this.n_d=$nd
      },
      showDevisForm($nd){
        this.devisOn = true ;
        this.n_d=$nd
      },
       annuller(){
      console.log('annuller');
     this.invoiceOn = false ;
      this.devisOn = false ;
     this.n_d='';
     this.numero_facture='';
    // this.montant_facture='';
    },

    addFacture(e){
       console.log('clickkke add facture');
                e.preventDefault();
     axios.patch('devis/fact/'+this.n_d , {
       numero_facture:this.numero_facture ,
       //montant_facture:this.montant_facture
     } 
     ).then(
       //response => console.log(respons.data) ,
      
      axios
      .get('/devis/client/'+this.allDevis.clientId)
      .then(response => {
        console.log('facturing')
        console.log(response.data)
        this.allDevis.devis=response.data.devis  ;
        this.allDevis.factures=response.data.factures  ;
         console.log('printing all devis')
         console.log(this.allDevis)
       this.n_d='';
     this.numero_facture='' ;
     this.invoiceOn=false ;
        })
      .catch(error => {
        console.log(response)
                   })
      .finally(),
      /* ************** */

       
     ).catch(error => this.errors.record(error.response.data['errors']))
     .finally()
    },

  

    editDevis(e){
       console.log('clickkke to edit devis');
                e.preventDefault();
     axios.patch('devis/edit/'+this.n_d , {
       montant_devis:this.montant_deviss ,
       //montant_facture:this.montant_facture
     } 
     ).then(respponse => {
            this.n_d='';
     this.montant_deviss='' ;
     this.devisOn=false ;
      
      axios
      .get('/devis/client/'+this.allDevis.clientId)
      .then(response => {
        console.log('facturing')
        console.log(response.data)
        this.allDevis.devis=response.data.devis  ;
        this.allDevis.factures=response.data.factures  ;
         console.log('printing all devis')
         console.log(this.allDevis)
       this.n_d='';
     this.numero_facture='' ;
     this.invoiceOn=false ;
      }
        )
      .catch(error => {
        console.log(response)
                   })
      .finally()
      /* ************** */
     }
      

       
     ).catch(error => this.errors.record(error.response.data['errors']))
     .finally()
    },

        
    
    }
    

   
  
}
</script>