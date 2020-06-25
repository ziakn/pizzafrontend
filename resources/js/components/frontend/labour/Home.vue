<template>
    <div>
        <BreadCrumb></BreadCrumb>
        <LabourList></LabourList>
    </div>
</template>
<script>
import BreadCrumb from './BreadCrumb';
import LabourList from './LabourList';
export default {
    components: {
            BreadCrumb,
            LabourList
        },
}
</script>