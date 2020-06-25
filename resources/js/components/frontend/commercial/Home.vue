<template>
    <div>
        <BreadCrumb></BreadCrumb>
                    <CommercialList></CommercialList>
               
    </div>
</template>
<script>
import BreadCrumb from './BreadCrumb';
import CommercialList from './CommercialList';
export default {
    components: {
            BreadCrumb,
            CommercialList
        },
}
</script>