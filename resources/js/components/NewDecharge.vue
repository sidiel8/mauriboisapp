<template>

<div>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
 Nouveau Decharge <i class="fas fa-plus"></i>
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nouveau Decharge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="turnSuccOff">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div  class="modal-body">
        <form  @submit="recherche" >
              <!-- <div class="row">
                 <div class="col-md-12">
                    <div class="form-group row">
                 
                        <div class="col-md-12">
                          <input id="name" type="text" class="form-control" v-model="name" minlength="2" maxlength="20" required placeholder="Nom"  autocomplete="off">
                            <span v-text="errors.get('name')"  ></span>
                        </div>
                        </div>
                         <div class="form-group row">
                        <div class="col-md-6">
                         <input id="fac" type="number" class="form-control"  v-model="numero_facture"  required placeholder="Numero Facture" autocomplete="off" >
                         <span class="text-danger" v-text="errors.get('numero_facture')" ></span>
                         </div>
                         </div>
                        <div class="form-group row">
                        <div class="col-md-12">
                         <input id="numero" type="number" class="form-control" v-model="numero"   required placeholder="Telephone" autocomplete="off" >
                         <span class="text-danger" v-text="errors.get('numero')" ></span>
                         </div>
                         </div>
          
                      

                                <div class="form-group row">
                                 
                                  <div class="col-md-12">
                                    <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                        <label class="input-group-text"><b>vendeur</b></label>
                                      </div>
                                      <select class="custom-select"  v-model="vendeur">
                                        <option selected  value="">Choisir ...</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="05">06</option>
                                        <option value="11">Reclamation</option>
                                      </select>
                                    </div>
                                    <span class="text-danger" v-text="errors.get('vendeur')" ></span>
                                  </div>
          
                              </div>
          
                                
                       
          
          
                             
                 </div>

</div>  -->
<div class="row">
          <div class="form-group col-md-12  mb-0">
                         <div class="row">
                           <div class="col-md-10">
                         <input id="fac" type="number" class="form-control"  v-model="numero_facture"  required placeholder="Numero Facture" autocomplete="off" >
                         <span class="text-danger"  ></span>
                         </div>
                      
                           <div class="col-md-2">
                           <button  class="btn btn-primary btn-block" > 
                                            <i v-if="search" class="fas fa-spinner fa-pulse"></i>
                                           <i v-else class="fas fa-search"></i>
                                          
                            </button>
                            </div>
                         </div>
  
</div>                      
</div>
          </form>

      <div v-if="success">
           <hr>
  <b>Resultat</b>          
<ul class="list-group">
  <li class="list-group-item  alert-danger" v-if="facture.length==0">
    <span style="color:red" >  Cette facture n'existe pas !!</span>
  </li> 
  <li v-else class="list-group-item" v-for="fac in facture" :key="fac.id" >
  <span class="float-left"><i class="fas fa-hand-holding-usd text-black mx-4"></i> N° : {{fac.numero_facture}} <br>
    <small> <i class="fas fa-user text-black mx-4"></i>  {{fac.client.name}} <i class="fas fa-mobile text-black mx-4"></i> {{fac.client.numero}} </small>
  </span>
     <span v-if="fac.date_decharge==null" class="float-right"><button class="btn btn-sm btn-success" @click="ajouter(fac.id)">Ajouter <i v-if="adding" class="fas fa-spinner fa-pulse"></i> </button></span>
     <span v-else class="float-right"><button class="btn btn-sm btn-danger" @click="retirer(fac.id)">Retirer  <i v-if="removing" class="fas fa-spinner fa-pulse"></i> </button></span>
  </li>
</ul>  </div>
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
     // end of class Errors

        export default {
             data(){
               return {
                 success: false ,
                 name:'',
                 numero:'',
                 numero_facture:'',
                 vendeur:'',
                 search:false ,
                 facture:{},
                 adding:false ,
                 removing:false,
                
                 errors:new Errors()
               }
             } ,

             methods:
             {
               
                  recherche(e) {
                    console.log('recherche');
                e.preventDefault();
                 this.search=true ;
               axios.get('/facture/'+ this.numero_facture)
                .then(response => {
                    this.facture = response.data ,
                    this.success=true ,
                    this.search=false ,
                    this.numero_facture="",
                  console.log(response.data) 
                   
                  //$('#success').html(response.data.suc) ;

                }
               
                )
                .catch(error =>
                   console.log(response) 
                   //console.log(error.response.data['errors'])
                )
            },
                 turnSuccOff() {
                   this.success=false ;
                   this.numero_facture="";
                   this.success=false;

                 }  
                 ,

               ajouter($id){
                       // e.preventDefault();
                        this.adding=true ;
                        axios.patch('/facture/add/'+ $id , {
          
                        }).then(
                          response => {
                            this.facture=response.data.res ,
                            this.adding=false ,
                            this.$emit('decharge' ,response.data.all)
                          }
                         
                         //console.log(response.data) 
                        ).catch(
                          error => console.log(error)
                        )
               } ,
                retirer($id){
                       // e.preventDefault();
                        this.removing=true ;
                        axios.patch('/facture/remove/'+ $id , {
          
                        }).then(
                          response => {
                            this.facture=response.data.res,
                            this.removing=false 
                            this.$emit('decharge' ,response.data.all)                   }
                         //console.log(response.data) 
                        ).catch(
                          error => console.log(error))
               
                }
               } 
             
        }
    </script>

    <style scoped>

    </style>