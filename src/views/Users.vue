<template>
<div>
  <SideBar></SideBar>

  <div class="form">
        <label class="col-form-label" for="inputDefault">Default input</label>
        <input type="text" class="form-control" placeholder="Default input" id="inputDefault">
  </div>

  <table class="table table-hover">
  
    <tr class="table-success">
      <th scope="col">ID</th>
      <th scope="col">Index Number</th>
      <th scope="col">Name</th>
      <th scope="col">Active</th>
    </tr>
  
  <tbody>
    <tr>
      <th>Active</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
  </tbody>
</table>
</div>
</template>

<script>
import SideBar from '@/components/Side_Bar.vue'
export default {
     components:{
       SideBar
     }
 }
</script>