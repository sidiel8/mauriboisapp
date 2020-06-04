<template>
    <div>
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
                                  </div>
          
                              </div>
    </div>    
</template>

<script>
export default {

      data () {
    return {
      users:{} ,
      loading: true,
      errored: false ,
      vendeur:''
     
     
    }
      },
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
}
</script>