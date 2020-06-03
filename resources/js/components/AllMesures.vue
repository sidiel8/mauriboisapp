<template>
    <div>
         
         <div class="modal fade" id="mesureModalLong" tabindex="-1" role="dialog" aria-labelledby="mesureModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="mesureModalLongTitle"> <b>{{all.clientName}} </b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  @click="turnOffLoad">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
    
      <div class="modal-body">
              <form  @submit="addM">
                <input type="hidden"  name="cl"  v-model="all.clientId" />
                <div class="form-row">
               <div class="form-group col-md-8">
              <select id="inputState" class="form-control" v-model="type" @keydown="errors.clear('type')">
              <option selected value="">Demander Une  Mesure</option>
              <option value="portes">Portes</option>
              <option value="cadre de paasgage">Cadre de Passage</option>
              <option value="cuisines">Cuisines</option>
              <option value="chambre a coucher">Chambre à coucher</option>
              <option value="dressing">Dressing</option>
              <option value="decoration">Decorations</option>
              <option value="parquet">Parquet</option>
              <option value="pergola">Pergola</option>
              <option value="bureaux">Bureaux</option>
              <option value="stores">Stores</option>
              <option value="fenetres">fénetres</option>
              <option value="Portes PVC ou Al">Portes PVC OU AL</option>
              <option value="autres">Autres</option>
              </select>
               <span class="text-danger" v-text="errors.get('type')" ></span>
    </div>
    <div class="form-group col-md-4">
    <button type="submit" class="btn btn-primary btn-block"><span v-if="!loader"> Ajouter</span><span v-else><i class="fas fa-spinner fa-spin"></i></span></button>
    </div>
  </div>
 
  
</form>
               
                           <div v-if="all.load" style="
                           text-align: center;
                           font-size: 30px;" >
                           <i class="fas fa-spinner fa-pulse"></i>
                           </div>
               <div v-else class="row" >
                 <div class="col-md-12">
                    <div class="form-group col-md-12">
                   <div  v-if="(all.mesures.length==0)" class="alert alert-danger" role="alert">
                   <h4 class="alert-heading">0 Mesures ! Pour {{all.clientName}}</h4>
                   
                   <hr>
                    </div>
                                 <ul v-else class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-right mb-2"  v-for="m in all.mesures" :key="m.id">
    {{m.type}}
    <ul class="list-group">
      <span v-if="m.confirmations.length==0"   class="badge-danger badge-pill">
        PAS ENCORE PRISE
      
      </span>
    <span v-else>
         <li v-for="conf in m.confirmations" :key="conf.id" class=" badge-primary badge-pill badge-primary mb-2">{{
      
      moment(conf.created_at).locale('fr').format('LL') 
        }} </li>
         </span>  
       </ul>
  </li>
   
  
  
</ul>
                   
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
      type:'',
      client_id:'' ,
      seuccess: false ,
      loader:false ,
      errors:new Errors(),
     
     
    } 
   },
    props:{
      all:Object ,
      
    } ,

    methods:{
      addM(e) { 
                    console.log('clickkke add M');
                e.preventDefault();
                this.loader= true ;
                e.disabled;
       
               axios.post('/mesure', {
                    type:this.type,
                    client_id:this.all.clientId ,
                 
                   
                   // savingSuccessful: false ,
                })
                .then(response => {
                  this.seuccess=true ;
                  this.loader=false ;
                  this.type="";
                   //console.log(response.data);
                   
                   axios
      .get('/mesures/client/'+this.all.clientId)
      .then(response => {this.all.mesures=response.data})
      .catch(error => {
        console.log(response)
        //this.errored = true 

      })
      .finally(() => this.all.load = false)
     

                }
               
                )
                .catch(error =>
                   this.errors.record(error.response.data['errors'])  
                   //console.log(error.response.data['errors'])
                ).finally(() => this.loader = false)
            } ,

       turnOffLoad() {
                  
                   this.all.load=true ;
                 }  ,
    }
  
}
</script>