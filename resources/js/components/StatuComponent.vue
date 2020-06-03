<template>
    <div>



<!-- Modal -->
<div class="modal fade" id="statuModalLong" tabindex="-1" role="dialog" aria-labelledby="statuModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
    
      <div class="modal-body">
          <div v-if="clientToEdit.loading" style="
    text-align: center;
    font-size: 30px;" >
           <i class="fas fa-spinner fa-pulse"></i>
        </div>
        <div v-else  class="text-center">
          

            <span v-if="clientToEdit.client.statu==1" class="text-center">
                    <i class="fas fa-check-circle text-center" style="color:green; fontSize:70px"></i>

                    <div style="fontSize:30px" ><b>{{clientToEdit.client.name}}</b> Est Prét(e).</div>
            </span>
            <span v-else  class="text-center">
    <i class="fas fa-times-circle text-center" style="color:red; fontSize:70px"></i>

                    <div style="fontSize:30px" ><b>{{clientToEdit.client.name}}</b> N'est Pas Prét(e).</div>
            </span>    
        </div>
      </div>
      <div class="modal-footer">
          <span v-if="clientToEdit.client.statu!=1">
                <button  class="btn btn-success " @click="statu"   >
                                          <span v-if="!loader">Prét</span> <span v-else><i class="fas fa-spinner fa-spin"></i></span>
                                        </button>
          </span>
        <button type="button" class="btn btn-danger" data-dismiss="modal" @click="turnSuccOff">Fermer</button>
       
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
     success:false ,
     loader:false,
     
    } 
   },
    
     props:{
      clientToEdit:Object
    } ,
    methods:{
        statu(e){
        this.loader=true ;
         e.preventDefault();
         console.log('update clicked')
        axios.patch('/clients/editstaut/'+ this.clientToEdit.client.id , 
          {
         
          }
        ).then(response => {
           this.clientToEdit.client=response.data , this.loader=false , this.success =true
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