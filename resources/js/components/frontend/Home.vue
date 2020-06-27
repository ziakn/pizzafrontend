<template>
     <div>
            
        <div style="padding-top: 5px; padding-bottom: 5px;">
            <div class="row">
                <div class="col-md-12" style="margin-bottom:5px;padding: 8px; border: 2px solid rgba(255, 255, 255, 0.25098039215686274);background-color: #151414;">
                    <div class="col-md-12">
                        <ul class="category">
                            <li class="active"> ALL</li>
                            <li>BEEF</li>
                            <li>CHICKEN</li>
                            <li>VEGETARIAN</li>
                            <li>SPECIALITY</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div v-for="(data,index) in dataList" :key="index" class="col-md-6" style="padding: 8px; border: 1px dotted rgba(255, 255, 255, 0.25098039215686274);background-color: #151414;">
                    <div class="col-md-6" style="text-align: center;">
                        <img :src="data.image" alt="">
                        <h3 style="margin-top: 10px; color: #ffffff;">USD {{data.price?data.price:data.large}}</h3>
                        <div style="margin-top: 10px; color: #ffffff;"># {{ data.count }}<br>
                            <button v-on:click.prevent="increment(data)" class="btn btn-default dropdown-toggle" >+</button>
                            <button v-on:click.prevent="decrement(data)" class="btn btn-default dropdown-toggle">-</button>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <h3 style="margin-top: 10px;color: #ffffff;">{{data.name}}</h3>
                        <p style="color: #ffffff;">{{data.description && data.description.length>100?data.description.slice(0,90)+'...':data.description}}</p>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-7" style="padding: 3px;">
                                <div class="dropdown">
                                    <select @change="getPan(data)"  v-model="data.type" class="selectpicker btn btn-default dropdown-toggle">
                                     <option value="pan">Pan</option>
                                    <option value="sfl">SFL</option>
                                    <option value="thin">Thin Scrap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5" style="padding: 3px;">
                                <select @change="getPrice(data)"  v-model="data.size" class="selectpicker btn btn-default dropdown-toggle">
                                     
                                <option value="large">Large</option>
                                <option value="medium">Medium</option>
                                <option value="small">Small</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" style="padding: 3px;">
                                
                            </div>
                            <div class="col-md-7" style="padding: 3px;">
                                <button type="button" class="btn btn-danger" style="width: 100%;" @click="sendtoCart(data)">ADD TO ORDER</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
           
            <!-- <div style="text-align: center; padding-top:10px; ">
                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>
                <button type="button" class="btn btn-primary">1</button>
                <button type="button" class="btn btn-primary">2</button>
                <button type="button" class="btn btn-primary">...</button>
                <button type="button" class="btn btn-primary">30</button>
                <button type="button" class="btn btn-primary">31</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
            </div> -->
        </div>
    
	
	
    </div>

</template>

<script>
import 'vuejs-noty/dist/vuejs-noty.css'
export default {
  components:{
  },
   data() {
          return {

              dataList: [], 
              price:null,
               count: 1,
               currency:"USD",
              
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
                    this.getPizza();
                },

                getPrice(data)
                {
                    if(data.size=="small")
                    {
                        data.original_price=data.small
                       return data.price = data.small
                                
                    }
                    if(data.size=="medium")
                    {
                        data.original_price=data.medium
                       return data.price = data.medium
                          
                    }
                    if(data.size=="large")
                    {
                        data.original_price=data.large
                       return data.price = data.large
                         
                    }
                },

        increment (data) 
        {
            console.log(data)
            data.count++;
            if(data.size=="large")
            {
                data.original_price=data.large
                return data.price = data.large * data.count
                 
            }
             if(data.size=="medium")
            {
                 data.original_price=data.medium
                return data.price = data.medium * data.count
                
            }
             if(data.size=="small")
            {
                data.original_price =data.small
                return data.price = data.small * data.count
                 
            }
            
        },

        decrement (data) 
            {
                    if(data.count > 1)
                    {
                    data.count-- ;
                    }
                    if(data.size=="large")
                    {
                        data.original_price=data.large
                        return data.price = data.large * data.count
                    }
                    if(data.size=="medium")
                    {
                        data.original_price=data.medium
                        return data.price = data.medium * data.count
                    }
                    if(data.size=="small")
                    {
                         data.original_price =data.small
                        return data.price = data.small * data.count
                    }
            },

            getPan(data)
            {
                if(data.type=="pan")
                    {
                        console.log(1)
                       return data.price = data.pan

                    }
                    if(data.type=="sfl")
                    {
                        console.log(2)
                       return data.price = data.sfo

                    }
                    if(data.type=="thin")
                    {
                        console.log(3)
                       return data.price = data.thin

                    }
            },

           async sendtoCart(data)
            {

                
                let formData = []
                formData = data
                 
                 try 
                                {
                                let {data} = await axios({
                                    method: "post",
                                    url: "/app/cart",
                                    data:formData
                                });
                               if (data.status) {
                                  this.$noty.success("Pizza Succefully Added to cart")
                                this.$store.commit('getCartData', data.data)
                                this.close();
                            } else {
                                this.snacks("Failed! "+data.data, "red");
                                this.loading = false;
                            }
                        } catch (e) {
                            this.snacks("Failed! "+e, "red");
                            this.loading = false;
                        }
            },

                async getPizza() 
                        {
                            try 
                                {
                                let {data} = await axios({
                                    method: "get",
                                    url: "/app/pizza",
                                });
                                this.dataList = data;
                                } 
                                catch (e) 
                                {
                                    console.log('fail')
                                }
                        },
                                  
            },
};
</script>
<style scoped>
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
  .message{
    padding-bottom: 0px;
    font-weight: bold;
  }
 
</style>