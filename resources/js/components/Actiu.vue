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
                <img  :src="'/img/act.jpg'"  style="width:200px ; height:200px"/>
                    <nav class="navbar navbar-light bg-light">
                       
                       
                        <b class="navbar-brand">Mesures Actiu</b>
                       
                        
                                  
                        <form class="form-inline">
                          <input class="form-control mr-sm-2" type="search" v-model="search" placeholder="Search" aria-label="Search">
                        </form>
                      </nav>
                    
                    </div>
                 <div v-if="loading" >
                           <loading></loading>
                       </div> 
                 <div v-else class="card-body">
                  <!-- <div  align="right" class="mb-1">
                     <a href="dynamic_pdf/portes/pdf" target="_blank" class=" btn-sm btn-info">PORTES <i class="fas fa-print"></i></a>
                   <a href="dynamic_pdf/autres_mesures/pdf" target="_blank" class="btn-sm btn-dark">AUTRES MESURES <i class="fas fa-print"></i></a>
                  </div>   -->
                  <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                           <th scope="col">N°</th>
                          <th scope="col">Nom De Client</th>
                          <th scope="col">Telephone <i class="fas fa-search"></i></th>
                          <th scope="col">Type Mesure</th>
                          <th scope="col">Date Demande</th>
                          <th scope="col">Confirmation</th>
                          
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         <tr   v-for="mesure in filteredMesure" :key="mesure.id" :id="mesure.id"  v-if="mesure.client.vendeur=='14'" >
                    
                          
                            <td scope="row"><b>{{mesure.id}}</b></td>
                            <td scope="row"><b>{{mesure.client.name}}</b></td>
                            <td scope="row"><b>{{mesure.client.numero}}</b></td>
                            <td scope="row"><b>{{mesure.type}}</b></td>
                           <td scope="row"><b>{{
            moment(mesure.created_at).locale('fr').format('LL')
                                                                  }}</b></td>
                            <td scope="row" :id="'conf'+mesure.id"> {{mesure.confirmations.length}}</td>

                          <td scope="row" >
                           <button :id="'btn'+ mesure.id " type="submit" class="btn btn-sm btn-secondary" @click="addDate(mesure.id)"><i class="fas fa-calendar-check" ></i></button>
                        
                           
                           <button    :id="'addC'+ mesure.id "
                            @click="getMesure(mesure.client.name ,mesure.id ,mesure.client.id )"
                           type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
                           data-target="#exampleModal" data-whatever="@getbootstrap">
                            <i class="fas fa-drafting-compass" >  </i>
                          </button>
                          
                          <button    :id="'sup'+ mesure.id "
                            @click="deleteItem(mesure.id)"
                           type="button" class="btn btn-danger btn-sm"  
                           >
                            <i class="fas fa-trash-alt" > </i>
                          </button>



                         </td>
                             
                            
                      
                            
                           
                             
                         
                       </tr>
                      
                      </tbody>
                    </table> 
                    <add-croquis v-bind:m_info="m_info"></add-croquis>
                 </div>
            </div>
        </div>
    </div>







<!-- Small modal -->





</div>






</template>

<script>
var moment = require('moment');
  export default {
      data () {
    return {
      moment:moment,
      search:'',
      mesures:{} ,
      loading: true,
      errored: false ,
      m_info:{
        mesure_id:'',
      clientName:'',
      clientId:'',
      confirmations:{},
      loading:true ,
      
      }

    }
  },
  created () {
    axios
      .get('/mesuresactiu')
      .then(response => {this.mesures = response.data , console.log('mesure')})
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)

  },
  methods:{
       

        addDate($id){
        
         
       this.$dialog.confirm("êtes-vous sûr de vouloir affecter une date a cette mesure ?.", {
    loader: true // default: false - when set to true, the proceed button shows a loader when clicked.
    			// And a dialog object will be passed to the then() callback
})
	.then((dialog) => {
        axios.post('/confirmation', 
          {
             mesure_id:$id
          }
        ).then(response => {
           var n  = $('#conf'+$id).html();
           
            
        $('#conf'+$id).html(parseInt(n)+1) ;
        })
        .catch(error => console.log(error)) 
        .finally(
          () => {
           
        

        }
        )
        setTimeout(() => {
			console.log(' ');
			dialog.close();
		}, 0);

	})
    .catch(() => {
        // Triggered when cancel button is clicked

        console.log('Delete aborted');
    });
    
      } ,
     
      getMesure($name , $id , $clientId ){
        
         this.m_info.mesure_id=$id;
        this.m_info.clientName=$name;
        this.m_info.clientId=$clientId ;
        
           axios.get('/confirmation/'+ $id)
           .then(response =>{
             this.m_info.confirmations=response.data ;
              this.m_info.loading=false ;
             } )
           .catch(error => console.log(error)) ;
      },
     // to delete an item
        deleteItem($id){
          this.$dialog.confirm("êtes-vous sûr de vouloir supprimer cette mesure ? ", {
         loader: true 
         })
	       .then((dialog) => {
        $('#sup'+$id).html('<i class="fas fa-circle-notch fa-spin"></i>');
        
          axios
      .delete('/mesure/'+$id)
      .then(response => {
        console.log(response);
         $('#'+$id).hide(500);
        this.del = false 
       
      
      }).finally(() => {}
       
        )
        setTimeout(() => {
			console.log('Delete action completed ');
			dialog.close();
		}, );

	})
    .catch(() => {
        // Triggered when cancel button is clicked

        console.log('Delete aborted');
    });

    }
   
    },
    computed:{
      filteredMesure: function() {

   if(this.search==''){
        return this.mesures;
   }else{
      var sss = this.mesures ;
    return  sss.filter((m)=>{
              
           return m.client.numero.toString().match(this.search);
                
    }
    );
   }
    

}
    }

  

 }
</script>