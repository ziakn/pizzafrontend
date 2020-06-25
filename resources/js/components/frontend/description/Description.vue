<template>
         <div class="property-details-wrap bg-cb">
           
            <!--Listing Details Info starts-->
            <div class="single-property-details mt-60">
                <div class="container" style="padding-top: 40px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="list-details-title" style="padding-bottom: 20px;">
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-7 col-sm-12">
                                        <div class="single-listing-title float-left">
                                            <h2>{{propertyDetail.title}}<span class="btn v5">For Rent</span></h2>
                                            <p><i class="fa fa-map-marker-alt"></i>{{propertyDetail.property_location}}, {{propertyDetail.street_name}},{{propertyDetail.street_no}}, {{propertyDetail.building_no}}</p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-12">
                                        <div class="list-details-btn text-right sm-left">
                                            <div class="trend-open">
                                                <h2 style="color:#e19c44;">{{propertyDetail.price}}<span class="per_month" style="color:#000000;">{{propertyDetail.rent_type}}</span></h2>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-12">
                            <div class="listing-desc-wrap mr-30">
                                <!--Listing Details starts-->
                                <div class="list-details-wrap">
                                    <div id="description" class="list-details-section">
                                        
                                          <template>
                                        <carousel  :paginationEnabled="false"  :loop="true" :per-page="1" :navigationEnabled="true" navigationNextLabel="<i class='fas fa-step-forward' style='font-size:20px;'></i>"
                                            navigationPrevLabel="<i class='fas fa-step-backward' style='font-size:20px;'></i>" >
                                            <slide
                                             v-for="(img,index) in propertyDetail.image" :key="index">
                                             <div style="width:100%;"><img :src="'http://admin.ajtqatar.qa' +img.image" style="width:690px; height:408px;"></div>
                                            </slide>
                                        </carousel>
                                        </template>
                                        <div class="overview-content" style="padding-top: 20px;;">
                                            <h3>Description</h3>
                                            <p class="mb-10">{{propertyDetail.description}}</p>
                                        </div>
                                    </div>
                                    
                                    <div id="details" class="list-details-section">
                                        <div class="mb-40">
                                            <h4>Amenities</h4>
                                            <ul class="listing-features">
                                                <li v-for="(data, index) in propertyDetail.propertyamenity" :key="index"><i :class="data.amenity.icon"></i> {{data.amenity.name}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div id="list-sidebar" class="listing-sidebar">
                                <div class="widget mortgage-widget">
                                    <h3 class="widget-title">Property ID : {{propertyDetail.property_id}}</h3>
                                    <!-- <div class="row" style="padding-bottom: 15px;">
                                        <div class="col-md-6">
                                            <button class="btn v2" style="width: 100%;min-height: 50px;"> <i class="fa fa-image" style="font-size: xx-large;"></i> </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn v2" style="width: 100%;min-height: 50px;"> <i class="fa fa-map-marker-alt" style="font-size: xx-large;"></i> </button>
                                        </div>
                                    </div> -->
                                    <div class="v2 filter">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-4 col-sm-6 col-12" style="margin-top: 3px; ">
                                               <a href="tel:+974 447 222 98"> <button class="btn v8" type="submit"> <i class="fa fa-phone"></i> +974 447 222 98</button></a>
                                            </div>
                                            <div class="col-xl-12 col-lg-4 col-sm-6 col-12" style="margin-top: 3px; margin-bottom: 3px;">
                                                <a href="mailto:ajtqatarwll@gmail.com"> <button class="btn v8" type="submit"> <i class="fa fa-envelope"></i> ajtqatarwll@gmail.com</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list-sidebar" class="listing-sidebar">
                                <div class="widget filter-widget">
                                    <form class="hero__form v2 filter">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-4 col-sm-6 col-12 mb-3">
                                                <form class="tour-form">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h3 style="margin-bottom: 0px;">Submit Enquiry</h3>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" v-model="editedItem.name" class="form-control filter-input" placeholder="Your name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" v-model="editedItem.phone" class="form-control filter-input" placeholder="Your Phone">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" v-model="editedItem.email" class="form-control filter-input" placeholder="Your email">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" v-model="editedItem.message" class="form-control filter-input" placeholder="Your message">
                                                        </div>
                                                        <div class="col-md-12" style="padding-top: 20px;">
                                                            <input class="btn v8" @click="submitInquiry"  value="Submit">
                                                        </div>
                                                    </div>
        
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Listing Details Info ends-->
            
        </div> 
</template>
<script>
import { Carousel, Slide } from 'vue-carousel';
import 'vuejs-noty/dist/vuejs-noty.css';
export default {
  components: {
    Carousel,
    Slide
  },
   data() {
            return {
                propertyDetail: Object,
                editedItem:
                {
                    name:'',
                    phone:'',
                    email:'',
                    message:'',
                }
            }
        },
  created()
        {
                this.getPropertyDetail();
        },
  methods:{

        async  getPropertyDetail()
               {
                    try 
                    {
                            let {data} =await axios({
                                method: "get",
                                url: "/app/fe/propertydetail/"+this.$route.params.slug,
                            });
                            this.propertyDetail = data;
                    
                    } catch (e) 
                    {
                    
                    }
                },

         async  submitInquiry()
               {
                    try 
                    {
                            let {data} =await axios({
                                method: "post",
                                url: "/app/fe/submitinquiry",
                                data: this.editedItem
                            });
                            if(data.status)
                                {
                                    this.editedItem.name=''
                                    this.editedItem.phone=''
                                    this.editedItem.email=''
                                    this.editedItem.message=''
                                    this.$noty.success("Your Inquiry has been submitted thankyou")
                                        
                                }
                                else
                                {
                                    this.$noty.error("Oops, something went wrong! Try Again")
                                        
                                }
                    
                    } catch (e) 
                    {
                    
                    }
                },


  },
};
</script>