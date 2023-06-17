require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps,{
    load:{
        key: '{{ env("GOOGLE_MAPS_KEY") }}',
    },
});

const app = new Vue({
    el: '#app',
    data(){
        return{
            lat:"",
            lng:"",
        }
    },
    methods:{

    }
});
