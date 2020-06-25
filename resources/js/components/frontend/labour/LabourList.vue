<template>
 <div class="filter-wrapper style1">
<div class="container">
<div class="row">
<div class="col-xl-3 col-lg-12">
                        <!--Sidebar starts-->
                        <div class="sidebar-left">
                            <div class="widget filter-widget">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-4 col-sm-6 col-12 mb-3">
                                            <select  v-model="filters.property_location" class="hero__form-input  custom-select"  >
                                                <option  value="" >Select Location</option>
                                                <option value="doha">Doha </option>
                                                <option value="alrayyan">Al Rayyan</option>
                                                <option value="ummsalal">Umm Slal</option>
                                                <option value="alkhor">Al Khor</option>
                                                <option value="alwakrah">Al Wakrah</option>
                                                <option value="aldaayen">Al Daayen</option>
                                                <option value="alshamal">Al Shamal </option>
                                                <option value="alsheehaniya">Al Sheehaniya </option>  
                                            </select>
                                        </div>
                                        <div class="col-xl-12 col-lg-4 col-sm-6 col-12 mb-3">
                                            <h5>Long Term</h5>
                                            <ul>
                                                <li>
                                                    <input id="check-a" type="checkbox" value="Monthly" v-model="filters.rentType">
                                                    <label for="check-a">Monthly</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-12 col-lg-4 col-sm-6 col-12 mb-3">
                                            <h5>Short Term</h5>
                                            <ul>
                                                <li>
                                                    <input id="check-b" type="checkbox" value="Daily" v-model="filters.rentType">
                                                    <label for="check-b">Daily</label>
                                                </li>
                                                <li>
                                                    <input id="check-c" type="checkbox" value="Weekly"  v-model="filters.rentType" >
                                                    <label for="check-c">Weekly</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-12 col-lg-4 col-sm-6 col-12 mb-3">
                                            <select v-model="filters.category_id" class="hero__form-input  custom-select" >
                                                <option value="">Property Type</option>
                                                <option value="4" >Residential</option>
                                                <option value="3" >Commercial</option>
                                                <option value="2" >Labour</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-4 col-sm-6 col-12">
                                            <button class="btn v8" @click="getLabour"> Search Property</button>
                                        </div>
                                    </div>
                             
                            </div>
                        </div>
                    </div>
     <div class="col-xl-9 col-lg-12">
                        <div class="sidebar-content-right py-40">
                            </div>
                            <div class="item-wrapper pt-20">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade  show active  property-list" id="list-view"  v-for="(data, index) in labourList" :key="index">
                                        <div class="single-property-box">
                                             <router-link  :to="('/frontend/propertydescription/'+data.slug)">
                                            <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div class="property-item" style="width:100%;height:auto;">
                                                    <img :src="'http://admin.ajtqatar.qa' +data.image[0].image" alt="#" style="width:340px; height:225px; padding-top:15px; padding-bottom:5px;">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12" style="padding-top:15px; padding-bottom:15px;">
                                                <div class="property-title-box">
                                                    <h4>{{data.title}}</h4>
                                                    <div class="property-location">
                                                        <i class="fa fa-map-marker-alt"></i>
                                                        <p>{{data.property_location}} - QATAR</p>
                                                    </div>
                                                    <ul class="property-feature">
                                                        <li> <i class="fas fa-bed"></i>
                                                            <span>{{data.room}}Bedrooms</span>
                                                        </li>
                                                        <li> <i class="fas fa-bath"></i>
                                                            <span>{{data.bathroom}} Bath</span>
                                                        </li>
                                                        <li> <i class="fas fa-arrows-alt"></i>
                                                            <span>{{data.furnish_type}}</span>
                                                        </li>
                                                        <li> <i class="fas fa-car"></i>
                                                            <span>{{data.parking_space}}</span>
                                                        </li>
                                                    </ul>
                                                    <div class="trending-bottom">
                                                        <a class="trend-right">
                                                            <div class="trend-open">
                                                                 <p><span class="per_sale">starts from</span>{{data.price}} QAR</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                             </router-link>
                                        </div>
                                        </div>
                                        <!--pagination starts-->
                                        <Pagination :meta_data="meta_data" v-on:next="getLabour"></Pagination>
                                        <!--pagination ends-->
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                
            </div>
              </div>
</template>

<script>
import Pagination from "../common/Pagination";
export default {
  components:{
        Pagination
  },
   data() {
          return {

              labourList: [], 
             
              filters:
              {
                  property_location:'',
                  category_id:'',
                  rentType:[],
                  show:50,
              },
              meta_data: {       
                   last_page: null,      
                    current_page: 1,       
                   prev_page_url: null    
                    },
          }
        },

        created()
            {

                this.initialize();

            },
        methods:
            {

                initialize()
                {

                    this.getLabour();

                },

                async getLabour(page = 1) 
                        {
                            try 
                                {
                                let {data} = await axios({
                                    method: "post",
                                    url: "/app/fe/labourlist",
                                     data: this.filters,
                                    params: {
                                        page
                                    }
                                });
                                this.labourList = data.data;
                                this.meta_data.last_page = data.last_page;
                                this.meta_data.current_page = data.current_page;
                                this.meta_data.prev_page_url = data.prev_page_url;
                                } 
                                catch (e) 
                                {
                                    console.log('fail')
                                }
                        },
                                  
            },
};
</script>