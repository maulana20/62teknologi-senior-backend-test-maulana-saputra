import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import VeeValidate from 'vee-validate';
import Vuex from 'vuex';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faHome, faUser, faUserPlus, faSignInAlt, faSignOutAlt, faStar, faStarHalf } from '@fortawesome/free-solid-svg-icons';
import * as VueGoogleMaps from 'vue2-google-maps';

library.add(faHome, faUser, faUserPlus, faSignInAlt, faSignOutAlt, faStar, faStarHalf);

Vue.config.productionTip = false;

Vue.use(VeeValidate);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.use(Vuex);

Vue.use(VueGoogleMaps, {
  load: {
    key: 'GMAP_KEY', // put gmap key in here
    libraries: 'places',
  },
  installComponents: true
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
