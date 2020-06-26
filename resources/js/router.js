import Vue from "vue";
import Router from 'vue-router'
// import dashboard from './components/dashboard/overview/Home.vue'
// import category from './components/dashboard/category/Home.vue'
// import amenity from './components/dashboard/amenity/Home.vue'
// import property from './components/dashboard/property/Home.vue'



import frontend from './components/frontend/Home.vue'


// import dashboardoverview from './components/dashboard/overview/OverView.vue'
// import categorylist from './components/dashboard/category/List.vue'
// import amenitylist from './components/dashboard/amenity/List.vue'
// import propertylist from './components/dashboard/property/List.vue'
// import propertyadd from './components/dashboard/property/Add.vue'
// import propertyedit from './components/dashboard/property/Edit.vue'
// import profile from './components/dashboard/profile/Profile.vue'



// import aboutus from './components/frontend/aboutus/AboutUs.vue'
// import contactus from './components/frontend/contactus/ContactUs.vue'
// import resedential from './components/frontend/resedential/Home.vue'
// import commercial from './components/frontend/commercial/Home.vue'
// import labour from './components/frontend/labour/Home.vue'
// import description from './components/frontend/description/Description.vue'

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
            title: 'Innoscripta',
            type: typeFront,
            }

        },
        // {
        //     path: '/frontend',
        //     name: 'frontend',
        //     component: frontend,
        //     meta: 
        //     {
        //     title: 'AJT',
        //     type: typeFront,
        //     }
        // },
        // {
        //     path: '/frontend/aboutus',
        //     name: 'About Us',
        //     component: aboutus,
        //     meta: 
        //     {
        //     title: 'AJT',
        //     type: typeFront,
        //     }
        // },
        // {
        //     path: '/frontend/resedential',
        //     name: 'Residential',
        //     component: resedential,
        //     meta: 
        //     {
        //     title: 'AJT',
        //     type: typeFront,
        //     }
        // },
        // {
        //     path: '/frontend/commercial',
        //     name: 'Commercial',
        //     component: commercial,
        //     meta: 
        //     {
        //     title: 'AJT',
        //     type: typeFront,
        //     }
        // },
        // {
        //     path: '/frontend/labour',
        //     name: 'Labour',
        //     component: labour,
        //     meta: 
        //     {
        //     title: 'AJT',
        //     type: typeFront,
        //     }
        // },
        // {
        //     path: '/frontend/contactus',
        //     name: 'Contact Us',
        //     component: contactus,
        //     meta: 
        //     {
        //     title: 'AJT',
        //     type: typeFront,
        //     }
        // },

        // {
        //     path: '/frontend/propertydescription/:slug',
        //     name: 'Description',
        //     component: description,
        //     meta: 
        //     {
        //     title: 'Property Description',
        //     type: typeFront,
        //     }
        // },

        


        
       ]
})