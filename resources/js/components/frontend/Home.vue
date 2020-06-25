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
                        <img src="images/slide1.jpg">
                        <h3 style="margin-top: 10px; color: #ffffff;">QAR {{data.price?data.price:data.large}}</h3>
                    </div>
                    <div class="col-md-6">
                        <h3 style="margin-top: 10px;color: #ffffff;">{{data.name}}</h3>
                        <p style="color: #ffffff;">{{data.description && data.description.length>100?data.description.slice(0,90)+'...':data.description}}</p>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-7" style="padding: 3px;">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Pan
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                    <li><a href="#">Pan</a></li>
                                    <li><a href="#">SFL</a></li>
                                    <li><a href="#">Thin Scrap</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5" style="padding: 3px;">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Large
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                    <li><a v-on:click="getPrice('small',data)">Small</a></li>
                                    <li><a v-on:click="getPrice('medium',data)">Medium</a></li>
                                    <li><a v-on:click="getPrice('large',data)">Large</a></li>
                                  
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" style="padding: 3px;">
                                <button type="button" class="btn btn-primary" style="width: 100%;">CUSTOMIZE</button>
                            </div>
                            <div class="col-md-7" style="padding: 3px;">
                                <button type="button" class="btn btn-danger" style="width: 100%;">ADD TO ORDER</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
           
            <div style="text-align: center; padding-top:10px; ">
                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>
                <button type="button" class="btn btn-primary">1</button>
                <button type="button" class="btn btn-primary">2</button>
                <button type="button" class="btn btn-primary">...</button>
                <button type="button" class="btn btn-primary">30</button>
                <button type="button" class="btn btn-primary">31</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    
    </div>

</template>

<script>
export default {
  components:{
  },
   data() {
          return {

              dataList: [], 
              price:null,
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
                    this.getPizza();
                },

                getPrice(item,data)
                {
                    console.log(item,data)
                    if(item=="small")
                    {
                       return data.price = data.small

                    }
                    if(item=="medium")
                    {
                       return data.price = data.medium

                    }
                    if(item=="large")
                    {
                       return data.price = data.large

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