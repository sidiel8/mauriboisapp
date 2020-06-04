<template>

<div>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
<i class="fas fa-user-plus"></i>
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nouveau Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="turnSuccOff">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    <div v-if="seuccess" class="alert alert-success alert-dismissible fade show" role="alert">
     LE CLINET <strong>  {{name}} </strong> 
 a été ajouté(e) avec succès .
     <br>
    <strong> Félicitaions  <i class="fas fa-smile"></i> </strong>
  
</div>
      <div v-else class="modal-body">
        <form  @submit="addClient" >
               <div class="row">
                 <div class="col-md-12">
                    <div class="form-group row">
                 
                        <div class="col-md-12">
                          <input id="name" type="text" class="form-control" v-model="name" minlength="2" maxlength="20" required placeholder="Nom"  autocomplete="off">
                            <span v-text="errors.get('name')"  ></span>
                        </div>
                        </div>
          
                        <div class="form-group row">
                        <div class="col-md-12">
                         <input id="numero" type="number" class="form-control"   v-model="numero" min="20000000"  max="49999999" onKeyPress="if(this.value.length==8) return false;"  required placeholder="numero" autocomplete="off" @keydown="errors.clear('numero')" >
                         <span class="text-danger" v-text="errors.get('numero')" ></span>
                         </div>
                         </div>
          
                        <div class="form-group row">
                           <div class="col-md-12">
                              <input id="email" type="email" class="form-control" v-model="email"  minlength="2" maxlength="40"  placeholder="Email" autocomplete="off">
                              <span class="invalid-feedback" role="alert">
                              </span>
                                  <span class="help is-danger" v-text="errors.get('email')" ></span>     
                            </div>
                        </div>

                         <div class="form-group row">
                           <div class="col-md-12">
                              <input id="quartier" type="text" class="form-control" v-model="quartier"  minlength="2" maxlength="15" required placeholder="Quartier" autocomplete="off">
                              <span class="invalid-feedback" role="alert">
                              </span>
                                  <span class="help is-danger" v-text="errors.get('quartier')" ></span>     
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
                                         <option v-for="user in users" :key="user.id" :value="user.nv">{{ '(' + user.nv +' )' +' '+ user.name}}</option>
                                      </select>
                                    </div>
                                    <span class="text-danger" v-text="errors.get('vendeur')" ></span>
                                  </div>
          
                              </div> 
          
                                
                       
          
          
                             
                 </div>

</div>  
<div class="row">
          <div class="form-group col-md-12  mb-0">
                                    <div class=" ">
                           <button  class="btn btn-primary btn-block" >
                                           Ajouter
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
          if(this.errors[field]){
          delete this.errors[field][0] ;
           }
       }
     }
     // end of class Errors

        export default {
             data(){
               return {
                 seuccess: false ,
                 name:'',
                 numero:'',
                 email:'',
                 quartier:'',
                 vendeur:'',
                 type_mesure: [],
                 errors:new Errors(),
                 users:{} ,
               }
             } ,
               created () {
    axios
      .get('/users/input')
      .then(response => {
        this.users = response.data;
        console.log('users' + this.users);
      })
      .catch(error => {
        console.log(error)
        this.errored = true 
             

      })
      .finally(() => this.loading = false)
    
  },

             methods:
             {
               
                  addClient(e) {
                    console.log('clickkke');
                e.preventDefault();
                
               axios.post('/client', {
                    name:this.name,
                    numero:this.numero,
                    email:this.email,
                    quartier:this.quartier,
                    vendeur:this.vendeur,
                   
                   // savingSuccessful: false ,
                })
                .then(response => {
                   
                   this.seuccess=true ;
                   this.$emit('client-added' ,response);
                   this.name="";
                    this.numero="";
                    this.quartier="";
                     this.email="";
                   this.vendeur="";
                   
                  //$('#success').html(response.data.suc) ;

                }
               
                )
                .catch(error =>
                   this.errors.record(error.response.data['errors'])  
                   //console.log(error.response.data['errors'])
                )
            },
                 turnSuccOff() {
                   this.seuccess=false ;
                   this.name="";
                   this.numero="";
                   this.quartier="";
                    this.email="";
                   this.vendeur="";
                   this.errors = new Errors;
                 }  ,
                 
               } 
             
        }
    </script>
