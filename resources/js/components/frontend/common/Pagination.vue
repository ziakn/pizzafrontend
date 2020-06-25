<template>
<div class="post-nav nav-res pt-50 pb-50  ">
    <div class="row">
        <div class="col-md-8 offset-md-2  col-xs-12 ">
         <div class="page-num text-center">
                <nav data-pagination>
                    <ul >
                        <li class="lnr lnr-chevron-left"
                            :class="{ 'disabled ': meta_data.prev_page_url === null }">
                            <a href="#" 
                                
                                @click="next(meta_data.current_page-1)">
                                &laquo;
                            </a>
                        </li>
                        <li 
                            v-for="page in meta_data.last_page" 
                            :key="page" 
                            :class="{ 'active':meta_data.current_page === page }">
                            <a href="#" 
                                @click.prevent="next(page)" 
                            >
                                {{ page }}
                            </a>
                        </li>
                        <li class="lnr lnr-chevron-right"  
                            :class="{ 'disabled': meta_data.current_page === meta_data.last_page }">
                            <a  href="#" 
                            
                                @click="next(meta_data.current_page + 1)">
                                &raquo;
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
</div>
</div>
</template>
<script>
export default {
    props: ['meta_data'],
    methods: {
        next(page) {
            this.$emit('next', page);
        }
    }
}
</script>