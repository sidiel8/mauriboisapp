<template>
    <div>
         
         <div class="modal fade" id="croquisModalLong" tabindex="-1" role="dialog" aria-labelledby="croquisModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

   <div >   <div  class="modal-header">
        <h5 class="modal-title" id="croquisModalLongTitle"><b>{{allCroquis.clientName}} </b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
    
      <div class="modal-body">
     
               
               <div class="row" >
                 <div class="col-md-12">
                    <div class="form-group col-md-12">
                   <div  v-if="(allCroquis.croquis.length==0)" class="alert alert-danger" role="alert">
                   <h4 class="alert-heading">0 Croquis ! Pour {{allCroquis.clientName}}</h4>
                   
                   <hr>
                    </div>
                    <div>
                       <h3>Listes Des Croquis</h3>
    <div class="card mb-3"  v-for="c in allCroquis.croquis" :key="c.id"  >
      <div class="card-body" style="padding:5px">
        <h5 class="card-title"><b>{{c.filename}}</b></h5>
        <p class="card-text">{{c.designation  }}</p>
        <embed :src="'/images/croquis/'+c.filename" width="100%" height="500" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" />

        <!-- <img  :src="'/images/'+c.filename"  style="width:100%"/> -->
        <p > Date :{{ moment(c.created_at).locale('fr').format('LL')}}</p>
        <span  class="btn btn-primary btn-sm mb-0">{{c.designer}}</span>  <a  class="btn btn-success btn-sm" :href="'/images/croquis/'+c.filename" style="float:right" download>
           Telecharger 
</a>
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

export default {
   
   data(){
    return {
      moment:moment ,
      
     
     
    } 
   },
    props:{
      allCroquis:Object ,
      
    } ,

    methods:{
    
    }
  
}
</script>