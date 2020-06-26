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
                    <router-link :to="('/frontend/resedential')"><a href="#">Pizza</a></router-link>
                    <router-link :to="('/frontend/commercial')"><a href="#">Contact</a></router-link>
                     <router-link :to="('/#')"><a href="#" data-toggle="modal" data-target="#myModal2">
                        Cart <i class="fa fa-shopping-cart" style="font-size:16px"></i> {{cartData.length}}
                   </a></router-link>
                
                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
            </div>
        </div>
    <!-- Modal -->
	<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="background-image:url(images/blackbg.jpg);">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Delciuos Collections<i class="fa fa-shopping-cart" style="font-size:16px"></i></h4>
				</div>

				<div class="modal-body">
					
                    <div v-for="(data,index) in cartData" :key="index" class="col-md-12" style="height: 120px; padding: 4px; border: 1px dotted rgba(255, 255, 255, 0.25098039215686274);background-color: #151414;">
                   <button @click="removeProduct(index)" type="button" class="close"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="col-md-3" style="text-align: center;">
                        <img :src="data.image" alt="">
                        <h6 style="margin-top: 5px; color: #ffffff;">Price {{data.price?data.price:data.large}}</h6>
                        
                    </div>
                    <div class="col-md-6">
                        <h4 style="margin-top: 5px;color: #ffffff;">{{data.name}}</h4>
                        <div class="col-md-7" style="padding: 5px; color: #ffffff;">
                                    {{data.type}} / {{data.size}}
                            </div>
                            <div style="margin-top: 10px; color: #ffffff;"># {{ data.quantity }}<br>
                            <button v-on:click.prevent="increment(data)" class="btn btn-default dropdown-toggle" >+</button>
                            <button v-on:click.prevent="decrement(data)" class="btn btn-default dropdown-toggle">-</button>
                            </div>
                    </div>
                </div>
				</div>
<footer class="demo-footer color: #ffffff;" >
     <h6 style="color: #ffffff;"> Payment type : <select @change="total()" v-model="currency"  class="selectpicker btn btn-default dropdown-toggle">
                                     
                                <option value="USD">USD</option>
                                <option value="EURO">EURO</option>
                                </select>
                                </h6>
	<a  target="_blank">Total Price : {{total()}}</a>
    <button  class="selectpicker btn btn-default dropdown-toggle" style=" background-color: red; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"  @click="getCheckOut()">checkout </button>
</footer>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
    </div>
</template>
<script>
 export default {
        data: () => ({

           dataList:[],
             price:null,
               count: 1,
               currency:"USD",
        }),

     
        computed: {
            cartData()
            {
                 return this.$store.state.cartData;
                
            }
        },
watch:
{
    
},
created() {
           this.initialize()
        },

        methods: {
            handleGoToMenu(d){
                return d
            },
            total()
            {
                let sum = 0;
                   
                if(this.currency=="USD")
                {
                     return this.cartData.reduce((sum, item) => sum + item.price, 0);
                }
                if(this.currency=="EURO")
                {
                    return this.cartData.reduce((sum, item) => sum + (item.price*0.89), 0);
                    
                }
            },
            initialize()
            {
                this.getPizza();
            },

            getPrice(data)
                {
                       return data.price = data.original_price
                },

        increment (data) 
        {
            data.quantity++;
                return data.price = data.original_price * data.quantity
            
        },

        decrement (data) 
            {
                    if(data.quantity > 1)
                    {

                     data.quantity-- ;
                      return data.price = data.original_price * data.quantity
                    }
                   
                        return data.price = data.original_price * data.quantity
                
            },

            removeProduct(index)
            {
                this.cartData.splice(index, 1)
            },

            
            async getPizza() 
                        {
                            try 
                                {
                                let {data} = await axios({
                                    method: "get",
                                    url: "/app/cart",
                                });
                                this.dataList = data;
                                for(let p of this.dataList)
                                {
                                    this.cartData.push(p)
                                }
                                } 
                                catch (e) 
                                {
                                    console.log('fail')
                                }
                        },



            async getCheckOut()
            {
                console.log(this.cartData);
                console.log(this.total());
                let formData = []
                formData = this.cartData
                formData.total = this.total()
                //  this.$store.commit('getCartData', data)
                 try 
                                {
                                let {data} = await axios({
                                    method: "post",
                                    url: "/app/order",
                                    data:formData
                                });
                               if (data.status) {
                                this.snacks("Successfully Added", "green");
                                this.close();
                            } else {
                                this.snacks("Failed! "+data.data, "red");
                                this.loading = false;
                            }
                        } catch (e) {
                            this.snacks("Failed! "+e, "red");
                            this.loading = false;
                        }
            }
        },
        
        
    };
</script>
<style scoped>
 .modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 500px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
		left: 0;
	}
        
/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

/* ----- v CAN BE DELETED v ----- */
body {
	background-color: #78909C;
}

.demo {
	padding-top: 60px;
	padding-bottom: 110px;
}

.btn-demo {
	margin: 15px;
	padding: 10px 15px;
	border-radius: 0;
	font-size: 16px;
	background-color: #FFFFFF;
}

.btn-demo:focus {
	outline: 0;
}

.demo-footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	padding: 15px;
	background-color: #212121;
	text-align: center;
}

.demo-footer > a {
	text-decoration: none;
	font-weight: bold;
	font-size: 16px;
	color: #fff;
}
</style>