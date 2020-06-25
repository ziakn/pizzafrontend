<template>
<div>
       <div class="breadcrumb-section bg-h" style="background-image: url(/ajtproperty/images/breadcrumb/breadcrumb_1.jpg)">
            <div class="overlay op-5"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <div class="breadcrumb-menu">
                            <h2>Contact us</h2>
                            <span><a href="index.html">Home</a></span>
                            <span>Contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb section ends-->

        <!--Contact info starts -->
        <div class="contact-info section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4>Address</h4>
                            <p>	P.O Box : 60582 - AL KHOR - QATAR</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <i class="fas fa-phone-alt"></i>
                            <h4>Direct Contact</h4>
                            <p><strong>Phone 1 : </strong>(+974) 4472 2298</p>
                            <p><strong>Phone 2 : </strong>(+974) 6670 9001</p>
                            <p><strong>Fax : </strong>	+974 447 211 25</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <i class="fas fa-business-time"></i>
                            <h4>Email</h4>
                            <p>ajtqatarwll@gmail.com</p>
                            <p>operations@ajtqatar.qa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact info ends -->
        <!--Contact section starts-->
        <div class="contact-section v1 mt-10 mb-120">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3595.5662539406662!2d51.492746214893394!3d25.685669318012522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45f9c9c41fd57d%3A0xb132dfdf7fbb3455!2sAl%20Janaen%20Trading%20WlI!5e0!3m2!1sen!2sqa!4v1582026299776!5m2!1sen!2sqa" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="section-title v2">
                            <h2>Write to us</h2>
                        </div>
                       
                            <div class="form-control-wrap">
                         
                                <div id="message" class="alert alert-danger alert-dismissible fade"></div>
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="editedItem.name" placeholder="Name*"  >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="editedItem.phone" placeholder="Phone - (+974) 1234 5678*"  >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="editedItem.email" placeholder="email"  >
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" v-model="editedItem.message" rows="5"  placeholder="Your Message"> </textarea>
                                </div>
                                <div class="form-group">
                                    <button @click="submitInquiry" class="btn v7">Send Message</button>
                                </div>
                             
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--Contact section ends-->
        <!-- Scroll to top starts-->
        <span class="scrolltotop"><i class="lnr lnr-arrow-up"></i></span>
        <!-- Scroll to top ends-->
   </div>
</template>

<script>

import 'vuejs-noty/dist/vuejs-noty.css';
export default {
  components: {
  
  },
   data() {
            return {
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
               
        },
  methods:{


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