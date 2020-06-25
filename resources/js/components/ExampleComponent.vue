<template>
  <div class="container">
    <Header></Header>
    <router-view></router-view>
    <Footer></Footer>
    </div>
</template>
<script>
 import Header from './frontend/common/Header';
 import Footer from './frontend/common/Footer';

export default {
     components: {
            Header,
            Footer,
        },
}
</script>