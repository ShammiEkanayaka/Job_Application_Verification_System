<template>
  <table class="table table-hover user-table">

    <tbody>
       <!-- <tr v-for="user in users" track-by="id" v-on:click.prevent="onEdit"> 
         <td><a href="#" v-on:click.prevent.stop="onRemove(user.id)">remove</a></td>
      </tr>
      -->
    </tbody>
  </table>
</template>

<script>
export default {
  props: ['users'],
  methods: {

    onRemove (userId) {
      this.$emit('remove', userId)
    }
  }
}
</script>