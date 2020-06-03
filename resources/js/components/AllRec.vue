<template>
    <div>    <div v-if="loading" >
                  <loading></loading>
            </div>
            <div  v-else class="">
                         <button class="btn btn-sm btn-primary" @click="turnToBOIS">Bois</button>   <button class=" btn btn-sm  btn-primary" @click="turnToPVC">PVC</button>
                        <a href="/dynamic_pdf/bois/pdf" target="_blank" class="btn btn-sm btn-secondary"> <i class="fas fa-print"> BOIS</i></a>
                        <a href="/dynamic_pdf/pvc/pdf" target="_blank" class="btn btn-sm btn-secondary"> <i class="fas fa-print"> PVC </i></a>
                            
                            <br>
                           <table class="table table-striped table-sm mt-2">
                      <thead>
                        <tr>
                          
                          <th scope="col">Prenom</th>
                          <th scope="col">Telephone</th>
                          <th scope="col">Type Rec</th>
                          <th scope="col">Date De Rec</th>
                          <th scope="col">categgory</th>
                          <th scope="col">Status</th>
                          
                          
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr v-for="rec in reclamations" :key="rec.id" :id="rec.id" >
                              <td>{{rec.name}}</td>
                              <td>{{rec.numero}}</td>
                              <td>{{rec.type}}</td>
                              <td>{{moment(rec.created_at).locale('fr').format('LL') }}</td>
                              <td>{{rec.category}}</td>
                            <td> <span v-if="rec.date_reparation==null" class="btn btn-danger"></span> <span v-else class="btn btn-success"></span> </td> 
                           <td>
                            <button :id="'u'+rec.id" v-if="rec.date_reparation==null" class="btn-sm btn-success" @click="update(rec.id)"><i class="fas fa-check"></i></button>
                            <button :id="'c'+rec.id" v-else class="btn-sm btn-warning" @click="cancel(rec.id)"> <i class="fas fa-times"></i></button>
                            <button class="btn-sm"  @click="deleteItem(rec.id)"> <i class="fas fa-trash" style="color:red"></i></button>
                           </td>
                          </tr>    
                      </tbody>
                    </table>
                         </div>
    </div>    
</template>


<script>

var moment = require('moment');
export default {
    
    data(){
           return {
              reclamations:{} ,
               loading:true ,
               moment:moment,
               listeBois:{},
               listePVC:{},
           }
    } ,
    created () {
    axios
      .get('/reclamations')
      .then(response  => {
            this.listeBOIS =response.data.reclamationsBOIS
          this.reclamations = response.data.reclamationsBOIS
         
          this.listePVC =response.data.reclamationsPVC
          })
      .catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

  },
  methods:{
      deleteItem($id){
        this.$dialog.confirm("êtes-vous sûr de vouloir supprimer cette reclamtion ? ", {
         loader: true 
         }).then((dialog) => {
        $('#btn'+$id).html('<i class="fas fa-circle-notch fa-spin"></i>');
          axios
      .delete('/reclamation/'+$id)
      .then(response => {
       axios
      .get('/reclamations')
      .then(response  => {
            this.listeBOIS =response.data.reclamationsBOIS
          this.reclamations = response.data.reclamationsBOIS
         
          this.listePVC =response.data.reclamationsPVC
          })
      .catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

  
           }).finally(() => {
        $('#'+$id).hide(500);
        this.del = false}
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
    } , 

    turnToPVC(){
 
        // this.listeBOIS=this.reclamations
        this.reclamations=this.listePVC
		
    },
    turnToBOIS(){
       // this.listeBOIS=this.reclamations
        this.reclamations=this.listeBOIS
    },

      update($id){
        this.loader=true ;
        // e.preventDefault();
         console.log('update clicked')
        axios.patch('/reclamation/edit/'+ $id, 
          {
            
            
          }
        ).then(response => {
        axios
      .get('/reclamations')
      .then(response  => {
            this.listeBOIS =response.data.reclamationsBOIS
          this.reclamations = response.data.reclamationsBOIS
         
          this.listePVC =response.data.reclamationsPVC
          })
      .catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

  
           })
        .catch(error => this.rec)
        .finally(() => {
        //$('#u'+$id).hide(500);
        //$('#c'+$id).show(500);
       
       }
        )
     
      
      },
      cancel($id){
        this.loader=true ;
        // e.preventDefault();
         console.log('update clicked')
        axios.patch('/reclamation/cancel/'+ $id, 
          {
            
            
          }
        ).then(response => {
       axios
      .get('/reclamations')
      .then(response  => {
            this.listeBOIS =response.data.reclamationsBOIS
          this.reclamations = response.data.reclamationsBOIS
         
          this.listePVC =response.data.reclamationsPVC
          })
      .catch(error => {
        console.log(error)
            
      })
      .finally(() => this.loading = false)

  
           })
        .catch(error => {
          console.log(error)
        })
        .finally(() => {
        //$('#c'+$id).hide(500);
        //$('#u'+$id).show(500);
       }
        )
      }


  },
   

}
</script>