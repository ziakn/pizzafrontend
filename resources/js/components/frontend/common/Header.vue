<template>
  <div>
        <div class="row" style="padding-top: 8px;">
            <div class="col-6 col-xs-6  col-sm-6 col-md-6 col-md-6">
                <p style="color: #4caf50"><i class="fa fa-phone"></i> (+974) 1234 5678</p>
            </div>
            <div class="col-6 col-xs-6  col-sm-6 col-md-6 col-md-6" style="text-align: right;">
                <p style="color: #d31e25;"><i class="fa fa-envelope"></i> abcd@gmail.com</p>
            </div>
        </div>
        <div class="row jumbotron" style="background-color: #ffffff;">
            <div class="col-6 col-xs-6  col-sm-6 col-md-6 ">
                <img src="images/logo.png" class="logo">
            </div>
            <div class="col-6 col-xs-6  col-sm-6 col-md-6 ">
                <div class="topnav" id="myTopnav" style="float: right;">
                    <router-link :to="('/frontend')"><a href="#">Home</a></router-link>
                    <router-link :to="('/frontend/aboutus')"><a href="#">About</a></router-link>
                    <router-link :to="('/frontend/resedential')"><a href="#" class="active">Pizza</a></router-link>
                    <router-link :to="('/frontend/commercial')"><a href="#">Contact</a></router-link>
                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
 export default {
        data: () => ({

        }),

     
        computed: {},

        methods: {
            handleGoToMenu(d){
                return d
            },
        },
        
        created() {

        },
    };
</script>