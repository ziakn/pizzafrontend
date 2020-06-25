<template>
            <div class="hero-slider v2">
            <div class="single-property-header v2">
                <div class="single-agency-slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                              
                            <div class="property-slider-img bg-l" >
                                <template>
                                        <carousel :autoplay="true" :autoplayTimeout="5000" :loop="true" :paginationEnabled="false" :per-page="1" >
                                            <slide
                                             v-for="(img,index) in items" :key="index">
                                             <img :src="img.src" />
                                            </slide>
                                        </carousel>
                                        </template>
                            </div>
                            <div class="container">
                                <div class="list-details-title v4">
                                    <div class="single-listing-title float-left">
                                        <h2>AJT REAL ESTATE -  RESIDENTIAL</h2>
                                        <p>AJT Real Estate is a reliable local real estate company launched under the umbrella of AJT groups.</p>
                                        <div class="trend-open">
                                               <router-link :to="('/frontend/aboutus')"><a class="btn v7">Read More</a></router-link> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</template>
<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
  components: {
    Carousel,
    Slide
  },
   data() {
            return {
               items: [
          {
            src: '/ajtproperty/images/single-agency/residential.jpg',
           
          },
          {
             src: '/ajtproperty/images/single-agency/comercial.jpg',
           
          },
          {
             src: '/ajtproperty/images/single-agency/labour.jpg',
           
          },
        ],
            }
        },
  created()
        {
        },
  methods:{

       

       


  },
};
</script>