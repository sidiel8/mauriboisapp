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
                       
                       
                        <b class="navbar-brand">Faire Un Devis </b>
                       
                        
                                  
                        <form class="form-inline">
                          <input class="form-control mr-sm-2" type="search" v-model="search" placeholder="Search" aria-label="Search">
                        </form>
                      </nav>
                    
                    </div>
                 <div v-if="loading" >
                           <loading></loading>
                       </div> 
                 <div v-else class="card-body">
                   <div  align="right" class="mb-1">
                     <a href="dynamic_pdf/portes/pdf" target="_blank" class=" btn-sm btn-info">PORTES <i class="fas fa-print"></i></a>
                   <a href="dynamic_pdf/autres_mesures/pdf" target="_blank" class="btn-sm btn-dark">AUTRES MESURES <i class="fas fa-print"></i></a>
                  </div>   
                  <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                           <th scope="col">N°</th>
                          <th scope="col">Nom De Client</th>
                          <th scope="col">Telephone <i class="fas fa-search"></i></th>
                          <th scope="col">Croquis</th>
                          <th scope="col">Vendeur</th>
                          <th scope="col">Date Croquis</th>
                          
                          
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         
                         
                          <tr v-for="cro in filteredCroquis" :key="cro.id" :id="cro.id" >
                            <td scope="row"><b>{{cro.id}}</b></td>
                            <td scope="row"><b>{{cro.client.name}}</b></td>
                            <td scope="row"><b>{{cro.client.numero}}</b></td>
                            <td scope="row"><b>{{cro.mesure.type}}</b></td>
                            
                            <td scope="row"><b>{{cro.client.vendeur}}</b></td>
                           <td scope="row"><b>{{
            moment(cro.created_at).locale('fr').format('LL')
                                                                  }}</b></td>
                            

                          <td scope="row" >
                           
                          
                          <button @click="getC(cro.id ,cro.client.name  , cro.client.id)" type="button" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#croquisModalLong"><i class="fas fa-eye" style="color:white"></i></button>



                         </td>
                             
                            
                      
                            
                           
                             
                        
                       </tr>
                      </tbody>
                    </table> 
                   <all-croquis  v-bind:allCroquis="allCroquis"  ></all-croquis>
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
      croquis:{} ,
      loading: true,
      errored: false ,
     
    allCroquis:{
        croquis:[],
        
        clientName:'',
        clientId:'',
        
      },

    }
  },
  created () {
    axios
      .get('/faireundevis')
      .then(response => {this.croquis = response.data , console.log('croquis')})
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)

  },
  methods:{
       

       getC(id , name , id_m ){
     
         axios
      .get('/croquis/'+id)
      .then(response => {this.allCroquis.croquis=response.data ,this.allCroquis.clientId=id_m ,this.allCroquis.clientName=name })
      .catch(error => {
        console.log(response)
        //this.errored = true 

      })
      .finally(() => this.allCroquis.load = false)
     } ,
     
   
  
   
    },
    computed:{
      filteredCroquis: function() {

   if(this.search==''){
        return this.croquis;
   }else{
      var sss = this.croquis ;
    return  sss.filter((c)=>{
              
           return c.client.numero.toString().match(this.search);
                
    }
    );
   }
    

}
    }

  

 }
</script>