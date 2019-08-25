<template>
<div>
  <SideBar></SideBar>
 <div class="container">
  <div class="form">
        <input type="text" v-model="filterInput" class="form-control" placeholder="Search by Index Number" id="inputDefault">
        <hr>
  </div>

  <table class="table table-hover">
  
    <tr class="table-success">
      <th scope="col">Index Number</th>
      <th scope="col">Reg. Number</th>
      <th scope="col">Name</th>
      <th scope="col">Current Level</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  
  <tbody>
    <tr v-for="(user, indx) in filterBy(Users, filterInput)" v-bind:key="indx">
      <th>{{user.index}}</th>
      <th>{{user.reg}}</th>
      <td>{{user.name}}</td>
      <td>{{user.level}}</td>
      <td>5</td>
      <td>
        <router-link class="btn btn-warning btn-sm" :to="'/edit/'+user.index">Edit</router-link>
        |
        <button type="button" class="btn btn-danger btn-sm" @click="deleteUser($event)" v-bind:id="user.index" :title="indx">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
</template>

<script>
import SideBar from '@/components/Side_Bar.vue'
export default {
  components:{
    SideBar
  },
  data(){
    return{
      Users:[],
      filterInput: ''
    } 
  },
  created(){
    this.scrollToTop();
    this.$http.get("http://localhost:8000/api/getUser")
    .then(function (response){
      this.Users = response.body.allUser;
    });
  },
  methods:{
    deleteUser(event){
      this.$http.delete("http://localhost:8000/api/deleteUser/"+event.target.id)
      .then(function (response){
         /* var position = this.user.findIndex(function(element){
          return element.id = event.target.id;
        })  */
        
        this.Users.splice(event.target.title,1)
      })
    },
    scrollToTop() {
                window.scrollTo(0,0);
           },
    filterBy(list, value){
      return list.filter(function(user){
        return user.index.indexOf(value) > -1;
      });
    }
  }
}
</script>
