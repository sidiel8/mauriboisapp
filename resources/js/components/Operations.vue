<template>
    <div>
<div class="card text-center">
 
  <div class="card-body">
    <h4 class="card-title">OPERATIONS </h4>
    
  <div class="row">
 
     <div class="col-md-4" >   
    <form  @submit="recherche" >
          <b style="float:left">Recherche Des Client</b><br>
        <hr>
      
    <div class="form-group">
    <input type="number"  min="0"  class="form-control"  placeholder="N° Telephone"  v-model="phone" required>
    </div>
    


     
    <div class="form-group  ">
    <button  class="btn btn-success btn-block "><span > OK</span><span></span></button>
    </div>
      
        </form>  
     </div> 


     <div  class="col-md-4">   
    <form  @submit="print" >
          <b style="float:left">Rapports</b><br>
               <hr>
      
    <div class="form-group ">
    <b for="start" style="float:left">Date Debut:</b>

<input type="date" id="start" v-model="start"
       value="2020-05-28"
       min="2020-05-28" max="2020-12-31">
    </div>

     <div class="form-group "  >
    <b for="start" style="float:left">Date Fin:</b>

<input type="date" id="end"  v-model="end"
       value="2020-05-28"
       min="2020-05-28" max="2020-12-31">
    </div>
    


     
    <div class="form-group  ">
    <button  class="btn btn-success btn-block "><span > Print </span><span></span></button>
    
    </div>  
        </form>  
     </div> 

  </div>

</div>

<ul class="list-group" >
   <div v-if="loading">
     <i class="fas fa-spinner fa-spin"></i>
   </div>
   <div v-else>
         <div v-if="clients.length==0">
    <span class="alert alert-danger "> {{resultat}} </span>
   </div>
 <div v-else>
     <li :id="client.id"   v-for="client in clients"  :key="client.id"  class="list-group-item d-flex justify-content-between align-items-center">
   {{client.name}}
    <span  @click="suppClient(client.id)" style="color:red ">Supprimer</span>
    
  </li>
 <div class="card-body"  style="border:1px solid black">
  <nav aria-label="">
  <ol class="breadcrumb" dir="rtl">
    <li class="breadcrumb-item active" dir="rtl"><h3>تقرير</h3></li>
  </ol>
</nav>
         

       <p style="font-size: 18px">   يحتوي النقرير التالي علي المعطيات بين تاريخي </p>
            <p style="font-size: 18px" dir="rtl"> {{this.start}}   الى  {{this.end}}  </p>

    <tr v-for="client in clts" :key="client.id">
      <td >{{client.name}}</td>
      <td>{{client.numero}}</td>
      <td>{{client.email ?  client.email :  '--------------' }}</td>
      <td>{{client.vendeur}}</td>
      <td>{{client.quartier}}</td>
      <td>{{
           client.created_at
        }}</td>
     
     
    </tr>
</div>
</div>

  




   </div>
 
</ul>
    </div>    
  </div> 
</template>
<script>

export default {

      data () {
    return {
      clients:{} ,
      loading: false,
      errored: false ,
      phone:'',
      resultat:'Ce Client N\'existe Pas ',
      start:'',
      end:'',
      clts:{}
     
    }
      },

    methods: {
    suppClient($id){
          
this.$dialog.confirm("êtes-vous sûr de vouloir supprimer ce client ? ", {
        
         })
	       .then((dialog) => {
            axios
      .get('/deleteclient/'+$id)
      .then(response => {
        console.log(response);
         $('#'+$id).hide(500);
        //this.del = false 
       
      
      }).finally(() => {}
       
        )


           })
    .catch(() => {
        // Triggered when cancel button is clicked

        console.log('Delete aborted');
    });
    },





    recherche(e){
         
                this.loading= true ;
                e.disabled;
        axios.get('/clienttoedit/'+this.phone, {
                   
               }).then(response => this.clients=response.data

            
               
               
                ).catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

    },

    print(e){
         
               // this.loading= true ;
                e.disabled;
        axios.post('/print/', {
                     start:this.start,
                     end:this.end ,
               }).then(response => this.clts=response.data

            
               
               
                ).catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

    }


    }






      }


</script>