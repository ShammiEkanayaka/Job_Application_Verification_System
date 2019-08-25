<template>
<div>
  <SideBar></SideBar>
  <h1>This is a home page</h1> 
  </div>
</template>

<script>
import SideBar from '@/components/Side_Bar.vue'
export default {
     components:{
       SideBar
     },
     data() {
      return {
        file: null,
        file2: null
      }
    }
 }
</script>