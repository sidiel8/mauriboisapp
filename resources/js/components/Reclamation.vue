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
                       
                       
                        <b class="navbar-brand">Reclamation  <i class="fas fa-hammer"></i></b>
                       </nav>
                    
                    </div>
                  
                 <div class="card-body">
                  <div class="row">
                         <div class="col-md-4">
                           <b class="form-group">Nouvelle Reclamation </b>
                            <form class="px-4 py-3">
    <div class="form-group">
      
      <input type="text" class="form-control"  v-model="name" placeholder="Prenom" required>
     <span class="text-danger" v-text="errors.get('name')" ></span>
    </div>
    <div class="form-group">
                         <input id="numero" type="number" class="form-control"   v-model="numero" min="20000000"  max="49999999" onKeyPress="if(this.value.length==8) return false;"  required:required placeholder="numero" autocomplete="off" @keydown="errors.clear('numero')" >
      <span class="text-danger" v-text="errors.get('numero')" ></span>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" v-model="type" placeholder="Type" required>
      <span class="text-danger" v-text="errors.get('type')" ></span>
    </div>
    
    <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline1" v-model="category" value="Bois" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">Bois</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" v-model="category" value="PVC" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">PVC</label>
</div>
    <span class="text-danger" v-text="errors.get('category')" ></span>
<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary btn-block " @click="addRec"><span v-if="!loader"> Ajouter</span><span v-else><i class="fas fa-spinner fa-spin"></i></span></button>
</div>    
  </form>
                         </div>
                     <div class="col-md-8">
                       <nav class="nav nav-pills flex-column flex-sm-row">
  

</nav>
                    <all-rec   :key="componentKey"  ></all-rec>
                     </div>  
                 
                  </div>
                   
                 </div>
            </div>
        </div>
    </div>







<!-- Small modal -->





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
      data () {
    return {
           
          name:'',
          numero:'',
          type:'',
          category:'',
          loader:false ,
          errors:new Errors(),
          componentKey: 0,
      }

    },

 


  methods:{
   addRec(e) { 
                    console.log('clickkke addRec');
                e.preventDefault();
                this.loader= true ;
                e.disabled;
       
               axios.post('/reclamations', {
                    name:this.name,
                    numero:this.numero,
                    type:this.type ,
                    category:this.category
                 
                })
                .then(response => {
                  console.log(response) ;
                   axios
      .get('/reclamations')
      .then(response  => {
        this.forceRerender()
          })
      .catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

  
                  }).catch(error => this.errors.record(error.response.data['errors']))
                  .finally(()=>{
                        this.loader=false ;
                        this.name="";
                        this.numero="";
                        this.type="";
                        this.catgory="" ;

                  })
      }   ,  
  
  forceRerender() {
      this.componentKey += 1;  
    } ,
  

 }
  }
</script>