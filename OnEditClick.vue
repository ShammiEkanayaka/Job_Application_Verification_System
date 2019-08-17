<template>
  <section>
    <!-- bind the onEditClicked() function to the edit event with the v-on directive -->
    <user-list
      :users="users"
      v-on:edit="onEditClicked"
    ></user-list>
  </section>
</template>

<script>


export default {
 
  methods: {
    
    onEditClicked (user) {

       this.userInForm = { user }
    }
  }
}
</script>