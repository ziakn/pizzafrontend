import Vue from "vue";
import Router from 'vue-router'

import frontend from './components/frontend/Home.vue'
import checkout from './components/frontend/Checkout.vue'



import aboutus from './components/frontend/aboutus/AboutUs.vue'
import contactus from './components/frontend/contactus/ContactUs.vue'

let adminOnly=[1]
let typeFront='frontend'

Vue.use(Router)
export default new Router({
    mode: "history",
    routes: [ 


        
        {
            path: '/',
            name: 'frontend',
            component: frontend,
            meta: 
            {
            title: 'Innoscripta|home',
            type: typeFront,
            }

        },
        {
            path: '/checkout',
            name: 'checkout',
            component: checkout,
            meta: 
            {
            title: 'Innoscripta|checout',
            type: typeFront,
            }
        },
        {
            path: '/aboutus',
            name: 'About Us',
            component: aboutus,
            meta: 
            {
            title: 'Innoscripta|Aboutus',
            type: typeFront,
            }
        },
        {
            path: '/contactus',
            name: 'contact Us',
            component: contactus,
            meta: 
            {
            title: 'contactus',
            type: typeFront,
            }
        },
     
        


        
       ]
})