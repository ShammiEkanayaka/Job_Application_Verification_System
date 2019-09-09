<template>
  <div>
    <SideBar></SideBar>
    <div class="container">
      <form @submit.prevent="updateInfo">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Index</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="index" v-model="user.index" />
          </div>
          <label class="col-sm-2 col-form-label">Reg. Number</label>
          <div class="col-sm-4">
            <input
              type="text"
              class="form-control"
              id="reg"
              placeholder="2016/SP/001"
              v-model="user.reg"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Full Name</label>
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
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
              class="form-control"
              id="email"
              placeholder="example@email.com"
              v-model="user.email"
            />
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-4">
            <input
              type="password"
              class="form-control"
              id="pass"
              v-model="user.pass"
              placeholder="Password"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mobile</label>
          <div class="col-sm-4">
            <input
              type="tel"
              class="form-control"
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
              class="form-control"
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
              class="form-control"
              id="loc"
              placeholder="Distric"
              v-model="user.loc"
            />
          </div>

          <label class="col-sm-2 col-form-label">Date of Birth</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="dob" v-model="user.dob" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Course</label>
          <div class="col-sm-4">
            <input
              type="text"
              class="form-control"
              id="course"
              placeholder="course"
              v-model="user.course"
            />
          </div>
          <label class="col-sm-2 col-form-label">Current Level</label>
          <div class="col-sm-auto">
            <select class="form-control" id="level" v-model="user.level">
              <option value disabled selected>Select Level</option>
              <option>1G</option>
              <option>1S</option>
              <option>2G</option>
              <option>2S</option>
              <option>3G</option>
              <option>3M</option>
              <option>3S</option>
              <option>4M</option>
              <option>4S</option>
            </select>
          </div>
          <label class="col-sm-auto col-form-label">GPA</label>
          <div class="col-sm-auto">
            <input
              type="number"
              min="0"
              max="4"
              step="0.001"
              class="form-control"
              id="gpa"
              placeholder="4.00"
              v-model="user.gpa"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Degree</label>
          <div class="col-sm-7">
            <input
              type="text"
              class="form-control"
              id="degree"
              v-model="user.degree"
              placeholder="Bachelor of Science Honours in Computer Science [BSc Hons (ComputerSc)"
            />
          </div>
          <label class="col-sm-1 col-form-label">Duration</label>
          <div class="col-sm-2">
            <select class="form-control" id="duration" v-model="user.duration">
              <option value disabled selected>Select Years</option>
              <option>3 years</option>
              <option>4 years</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Achievements</label>
          <div class="col-sm-10">
            <textarea
              class="form-control"
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
              class="form-control"
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
              class="form-control"
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
              class="form-control"
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
              class="form-control"
              id="github"
              v-model="user.github"
              placeholder="https://github.com/"
            />
          </div>
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-success" style="margin-left: 90%">Update</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import SideBar from "@/components/Side_Bar.vue";

export default {
  components: {
    SideBar
  },
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