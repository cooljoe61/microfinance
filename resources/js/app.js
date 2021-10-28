require('./bootstrap');

window.Vue = require('vue');
import VCalendar from 'v-calendar';
import Swal from 'sweetalert2'
import router from './router'

window.swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4500,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

Vue.use(VCalendar, {
  componentPrefix:'vc'
});
  
window.toast = toast;


const app = new Vue({
    el: '#app',
    router
});
