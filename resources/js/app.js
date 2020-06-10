
require('./bootstrap');
/**************************** 
require('tableexport.jquery.plugin');
require('bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js');
require('bootstrap-table/dist/extensions/print/bootstrap-table-print.min.js');


require('@fortawesome/fontawesome-free/js/all.js');
require('bootstrap-table/dist/bootstrap-table.min.css');
require('bootstrap-table/dist/bootstrap-table.js');



require('bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.css');
require('bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js');



*/





/*********************************** */
window.Vue = require('vue');
import VueRouter from 'vue-router'
import moment from 'moment'
Vue.use(VueRouter) ,
Vue.filter("date", function(value) {
   if (!value) return "";
   return format(new Date(value),"Y-m-D") ;

 });

 import Permissions from './mixins/Permissions';
Vue.mixin(Permissions);



 import Vue from "vue"
 import VuejsDialog from 'vuejs-dialog';
 import VuejsDialogMixin from 'vuejs-dialog/dist/vuejs-dialog-mixin.min.js';
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
// Tell Vue to install the plugin.
Vue.use(VuejsDialog)

import Home from './components/Home.vue' ;
import Client from './components/ClientsComponent.vue' ;
import Test from './components/fortest.vue' ;
import Mesure from './components/MesuresComponent.vue' ;
import FaireUnDevis from './components/FaireUnDevis.vue' ;
import Devis from './components/ListeDevisComponent.vue' ;
import Factures from './components/ListeFactureComponent.vue' ;
import StockageEtLivraison from './components/StockageEtLivraison.vue' ;
import Insatallation from './components/Insatallation.vue' ;
import ListeDecharge from './components/ListeDecharge.vue' ;
import Reclamtion from './components/Reclamation.vue' ;
import Actiu from './components/Actiu.vue' ;
import Operations from './components/Operations.vue' ;
Vue.component('loading', require('./components/Loading.vue').default);
Vue.component('loading', require('./components/Loading.vue').default);
Vue.component('under-construction', require('./components/UnderConstruction.vue').default);
Vue.component('add-croquis', require('./components/AddCroquis.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('new-client', require('./components/NewClient.vue').default);
Vue.component('new-decharge', require('./components/NewDecharge.vue').default);
Vue.component('edit-client', require('./components/EditClientComponent.vue').default);
Vue.component('statu-client', require('./components/StatuComponent.vue').default);
Vue.component('all-mesure', require('./components/AllMesures.vue').default);
Vue.component('all-croquis', require('./components/AllCroquis.vue').default);
Vue.component('all-devis', require('./components/DevisComponent.vue').default);
Vue.component('all-factures', require('./components/FactureComponent.vue').default);
Vue.component('all-rec', require('./components/AllRec.vue').default);
Vue.component('users', require('./components/Users.vue').default);
const routes = [
      { 
    path: '/',
    component: Home 
      },
      { 
       path: '/clients',
       component:  Client
      },
      { 
         path: '/mesures',
         component: Mesure 
      },
      { 
        path: '/stockageEtlivraison',
        component: StockageEtLivraison 
     },
     { 
      path: '/installation',
      component: Insatallation
   },
      { 
        path: '/devis',
        component: Devis 
     },
     { 
      path: '/factures',
      component: Factures 
   },
   { 
    path: '/liste_decharge',
    component: ListeDecharge 
  },
  { 
    path: '/reclamation',
    component: Reclamtion 
  },
  { 
    path: '/actiu',
    component: Actiu 
  }
  ,
  { 
    path: '/operations',
    component: Operations 
  },
  { 
    path: '/faireundevis',
    component: FaireUnDevis 
  }

 ]
 const router = new VueRouter({
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
   router ,
   data : {
     // moment:moment
   }
});
