<template>
  <div class="col-12 bg container">
    <div class="container">
      <div class="form">
        <input
          type="text"
          v-model="filterInput"
          class="form-control"
          placeholder="Search by Index Number"
          id="inputDefault"
        />
        <hr />
      </div>

      <table class="table">
        <tr class="table-success">
          <th scope="col">Index Number</th>
          <th scope="col">Reg. Number</th>
          <th scope="col">Name</th>
          <th scope="col">Current Level</th>
          <th scope="col">Status</th>
          <th scope="col"></th>
        </tr>

        <tbody>
          <tr id="row" v-for="(user, indx) in filterBy(Users, filterInput)" v-bind:key="indx">
            <td>{{user.index}}</td>
            <td>{{user.reg}}</td>
            <td align="left">{{user.name}}</td>
            <td>{{user.level}}</td>
            <td>
              <div class="row-center">
                <b-form-invalid-feedback
                  class="badge badge-pill badge-danger col-sm-auto small"
                  v-show="!Boolean(user.status)"
                  :state="Boolean(user.status)"
                >Deactivate</b-form-invalid-feedback>
                <b-form-valid-feedback
                  class="badge badge-pill badge-success col-sm-auto small"
                  v-show="Boolean(user.status)"
                  :state="Boolean(user.status)"
                >Activate</b-form-valid-feedback>
              </div>
              <div class="row-center">
                <b-form-checkbox
                  @input="updateInfo($event, user.index)"
                  v-bind:id="user.index"
                  :value="1"
                  :title="indx"
                  class="col-sm-auto"
                  switch
                  v-model="user.status"
                  :state="Boolean(user.status)"
                  name="checkbox-validation"
                />
              </div>
            </td>
            <td>
              <router-link class="btn btn-warning btn-sm" :to="'/edit/'+user.index">Edit</router-link>
              <button
                type="button"
                class="btn btn-danger btn-sm"
                @click="deleteUser($event)"
                v-bind:id="user.index"
                :title="indx"
              >Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
//import EventBus from "@/EventBus";
//import SideBar from '@/components/Side_Bar.vue'
export default {
  /* components:{
    SideBar
  }, */
  data() {
    return {
      Users: [],
      filterInput: ""
    };
  },
  created() {
    this.scrollToTop();
    this.$http
      .get("http://localhost:8000/api/getUser", {
        headers: {
          Authorization: `Bearer ${localStorage.usertoken}`
        }
      })
      .then(function(response) {
        this.Users = response.body.allUser;
      });
  },
  methods: {
    deleteUser(event) {
      swal({
        title: "Are you sure",
        text: "Do you want delete " + event.target.id + " user?",
        icon: "error",
        //buttons: true,
        buttons: ["No", "Yes !"],
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.$http
            .delete("http://localhost:8000/api/deleteUser/" + event.target.id)
            .then(function(response) {
              /* var position = this.user.findIndex(function(element){
          return element.id = event.target.id;
        })  */

              this.Users.splice(event.target.title, 1);
            });
        }
      });
    },
    updateInfo($event, id) {
      //console.log(event.target.title);
      this.$http
        .put(
          "http://localhost:8000/api/editUserStatus/" + event.target.id,
          this.Users[event.target.title]
        )
        .then(function(response) {
          swal("Updated", "User status updated", "warning");
        });
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    },
    filterBy(list, value) {
      return list.filter(function(user) {
        return user.index.indexOf(value) > -1;
      });
    }
  }
};
</script>

<style scoped>
.bg {
  /* The image used */
  background-image: url("https://webfoundation.org/docs/2017/03/March-12-Letter.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.container {
  background-color: rgba(136, 194, 248, 0.685);
  padding-top: 50px;
  border-radius: 10px;
  min-height: 600px;
}
.table-success {
  font-weight: bold;
  color: black;
} 
#row {
  font-weight: bold;
  color: black;
}
</style>