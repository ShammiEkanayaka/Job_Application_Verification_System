<template>
  <div>
    <app-nav></app-nav>
    <app-home></app-home>

  </div>
</template>

<script>
  
  import Home from './components/Home.vue'

  import HomeSecurity from './components2/HomeSecurity.vue'

  export default
  {
    components:{

      'app-home':Home,
      'userAccount-Security': HomeSecurity


    }
  }


</script>


<style>

</style>
