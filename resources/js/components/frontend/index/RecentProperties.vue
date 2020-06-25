<template>
    <div class="trending-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title v2">
                            <p>Browse some of our</p>
                            <h2>Recent Properties</h2>
                        </div>
                    </div>
                    <div class="swiper-container trending-place-wrap">
                        <div class=" row">
                            <div class=" col-md-4">
                                
                                <div class="single-property-box">
                                    <router-link :to="('/frontend/resedential')">
                                    <div class="property-item">
                                        <a class="property-img" ><img src="/ajtproperty/images/single-agency/residential.jpg" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span>AJT</span></li>
                                        </ul>
                                    </div>
                                    </router-link>
                                    <div class="property-title-box">
                                        <h4>Residential</h4>
                                        
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li>AJT Trading & Contracting</li>
                                                </ul>
                                            </div>
                                             <router-link :to="('/frontend/resedential')">
                                            <a class="trend-right float-right" >
                                                <div class="trend-open">
                                                    <p>View More</p>
                                                </div>
                                            </a>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class=" col-md-4">
                                <div class="single-property-box">
                                     <router-link :to="('/frontend/commercial')">
                                    <div class="property-item">
                                        <a class="property-img" href="#"><img src="/ajtproperty/images/single-agency/comercial.jpg" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span>AJT</span></li>
                                        </ul>
                                    </div>
                                     </router-link >
                                    <div class="property-title-box">
                                        <h4>Commercial</h4>
                                        
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li>AJT Trading & Contracting</li>
                                                </ul>
                                            </div>
                                             <router-link :to="('/frontend/commercial')">
                                            <a class="trend-right float-right" href="#">
                                                <div class="trend-open">
                                                    <p>View More</p>
                                                </div>
                                            </a>
                                             </router-link >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-property-box">
                                     <router-link :to="('/frontend/labour')">
                                    <div class="property-item">
                                        <a class="property-img" href="#"><img src="/ajtproperty/images/single-agency/labour.jpg" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span>AJT</span></li>
                                        </ul>
                                    </div>
                                     </router-link>
                                    <div class="property-title-box">
                                        <h4>Labour</h4>
                                        
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li>AJT Trading & Contracting</li>
                                                </ul>
                                            </div>
                                             <router-link :to="('/frontend/labour')">
                                            <a class="trend-right float-right" href="#">
                                                <div class="trend-open">
                                                      <p>View More</p>
                                                </div>
                                            </a>
                                             </router-link >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="trending-pagination"></div>
                </div>
            </div>
        </div>
        
</template>
<script>
export default {
    data: () => ({

        }),

        props: {
            dataComponent: {},
        },

        computed: {},

        methods: {
            handleGoToMenu(d){
                return d
            },
        },
        
        created() {

        },
}
</script>