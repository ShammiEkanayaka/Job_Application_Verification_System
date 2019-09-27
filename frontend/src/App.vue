<template>
  <div id="app">
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a @click="$router.push('/')" class="navbar-brand">
    <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt="mdb logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" @click="$router.push('/')">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" @click="$router.push('/register')">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" @click="$router.push('/')">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">

        <a v-if="profile===null" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Profile </a>

          <a v-if="profile!==null" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> {{this.$store.state.Index}}{{this.$store.state.Email}} </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a v-if="profile==='userlogd'" @click="$router.push('/editUser')" class="dropdown-item">My account</a>
          <a v-if="profile==='adminlogd'" @click="$router.push('/users')" class="dropdown-item">Users</a>
          <a v-if="profile==='adminlogd'" @click="$router.push('/add')" class="dropdown-item">Add Users</a>
          <a v-if="profile===null" @click="$router.push('/login')" class="dropdown-item">Login</a>
          <a v-if="profile!==null" class="dropdown-item" @click="logout(),$router.push('/')">Log out</a>
          <a v-if="profile===null" class="dropdown-item" @click="$router.push('/admin/login')">Admin</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    <router-view />
  </div>
</template>

<script>
//import EventBus from "@/EventBus.vue";
export default {
  /* data() {
    return {
      auth: "",
      index: "",
      email: ""
    };
  }, */
  computed:{
    profile(){
      return this.$store.getters.profile
    }
  },
  /* mounted() {
    EventBus.$on("logged-in", status =>{
      this.auth = status
    })
  }, */
  methods: {
    logout(){
        this.$http.get("http://localhost:8000/api/logout", {
          headers: {
            Authorization: `Bearer ${localStorage.usertoken}`
          }
        })
        .then(function(response) {
          localStorage.removeItem('usertoken');
          localStorage.removeItem('index');
          localStorage.removeItem('email');
          //this.emitMethod()
          this.$store.commit('updateIndex', localStorage.getItem('index'));
          this.$store.commit('updateEmail', localStorage.getItem('email'));
        });
        
    },
    /* emitMethod() {
      EventBus.$emit("logged-in", "");
    }, */
    /* update(){
      this.$store.commit('updateIndex', localStorage.getItem('index'));
      this.$store.commit('updateEmail', localStorage.getItem('email'));
    } */
  }
};
</script>

<style>
 #app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
