<template>
  <div>
    <SideBar></SideBar>
    <div class="container">
      <form @submit.prevent="updateInfo">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Full Name</label>
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control-plaintext"
              readonly
              id="name"
              v-model="user.name"
              placeholder="full name"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-4">
            <input
              type="email"
              class="form-control-plaintext"
              readonly
              id="email"
              placeholder="example@email.com"
              v-model="user.email"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mobile</label>
          <div class="col-sm-4">
            <input
              type="tel"
              class="form-control-plaintext"
              readonly
              pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
              id="tel"
              placeholder="0##-###-####"
              v-model="user.tel"
            />
          </div>
          <label class="col-sm-2 col-form-label">NIC</label>
          <div class="col-sm-4">
            <input
              type="tel"
              class="form-control-plaintext"
              readonly
              id="nic"
              placeholder="#########v"
              v-model="user.nic"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Location</label>
          <div class="col-sm-4">
            <input
              type="text"
              class="form-control-plaintext"
              readonly
              id="loc"
              placeholder="Distric"
              v-model="user.loc"
            />
          </div>

          <label class="col-sm-2 col-form-label">Date of Birth</label>
          <div class="col-sm-4">
            <input type="date" class="form-control-plaintext" readonly id="dob" v-model="user.dob" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Index</label>
          <div class="col-sm-4">
            <input
              type="text"
              class="form-control-plaintext"
              readonly
              id="index"
              v-model="user.index"
            />
          </div>
          <label class="col-sm-2 col-form-label">Reg. Number</label>
          <div class="col-sm-4">
            <input
              type="text"
              class="form-control-plaintext"
              readonly
              id="reg"
              placeholder="2016/SP/001"
              v-model="user.reg"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Course</label>
          <div class="col-sm-4">
            <input
              type="text"
              class="form-control-plaintext"
              readonly
              id="course"
              placeholder="course"
              v-model="user.course"
            />
          </div>
          <label class="col-sm-2 col-form-label">Current Level</label>
          <div class="col-sm-1">
            <input class="form-control-plaintext" readonly id="level" v-model="user.level" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">GPA</label>
          <div class="col-sm-4">
            <input
              type="text"
              min="0"
              max="4"
              step="0.001"
              class="form-control-plaintext"
              readonly
              id="gpa"
              placeholder="4.00"
              v-model="user.gpa"
            />
          </div>
          <label class="col-sm-2 col-form-label">Duration</label>
          <div class="col-sm-4">
            <input class="form-control-plaintext" readonly id="duration" v-model="user.duration" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Degree</label>
          <div class="col-sm-7">
            <input
              type="text"
              class="form-control-plaintext"
              readonly
              id="degree"
              v-model="user.degree"
              placeholder="Bachelor of Science Honours in Computer Science [BSc Hons (ComputerSc)"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Achievements</label>
          <div class="col-sm-10">
            <textarea
              class="form-control-plaintext"
              readonly
              id="achiev"
              rows="3"
              placeholder="Sports, Leadership"
              v-model="user.achiev"
            ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Project - I</label>
          <div class="col-sm-10">
            <textarea
              class="form-control-plaintext"
              readonly
              id="p1"
              rows="3"
              v-model="user.p1"
              placeholder="Description, Languages, Framework, Databases"
            ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Project - II</label>
          <div class="col-sm-10">
            <textarea
              class="form-control-plaintext"
              readonly
              id="p2"
              rows="3"
              v-model="user.p2"
              placeholder="Description, Languages, Framework, Databases"
            ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">LinkedIn</label>
          <div class="col-sm-10">
            <input
              type="url"
              class="form-control-plaintext"
              readonly
              id="linkedin"
              v-model="user.linkedin"
              placeholder="https://www.linkedin.com/"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">GitHub</label>
          <div class="col-sm-10">
            <input
              type="url"
              class="form-control-plaintext"
              readonly
              id="github"
              v-model="user.github"
              placeholder="https://github.com/"
            />
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
//import SideBar from "@/components/Side_Bar.vue";

export default {
  /* components: {
    SideBar
  }, */
  created() {
    this.getData();
  },
  data() {
    return {
      user: {}
    };
  },
  methods: {
    getData() {
      this.$http
        .get("http://localhost:8000/api/getUser1/" + this.$route.params.index)
        .then(function(response) {
          this.user = response.body["0"].user;
        });
    },
    updateInfo() {
      this.$http
        .put(
          "http://localhost:8000/api/editUser/" + this.$route.params.index,
          this.user
        )
        .then(function(response) {
          this.$router.push("/users");
        });
    }
  }
};
</script>