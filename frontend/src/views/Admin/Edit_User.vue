<template>
  <div>
    <SideBar></SideBar>
    <div class="container">
      <form @submit.prevent="updateInfo">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4"></div>
          <div class="col-sm-4 card mb-5 shadow">
            <div class="card-body">
              <h6 class="card-subtitle text-muted">Profile picture</h6>
            </div>
            <img
              v-if="!user.image"
              src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
              alt="Card image"
            />
            <img
              v-else-if="!imaging"
              v-bind:src="'http://localhost:8000/Profile_Pic/'+user.image"
              alt="Card image"
            />
            <img v-else v-bind:src="user.image" alt="Card image" />
            <div class="card-footer text-muted">
              <b-form-file
                size="sm"
                style="text-align: left"
                placeholder="Choose a file or drop it here..."
                drop-placeholder="Drop file here..."
                @change="getImage($event)"
              ></b-form-file>
              <!-- <div class="form-group mb-1">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" @change="getImage($event)" class="form-control custom-file-input" name="image" id="inputGroupFile02">
                                <small class="custom-file-label row" for="inputGroupFile02">Choose file</small>
                            </div>
                        </div>
              </div>-->
              <small
                id="fileHelp"
                class="row form-text text-muted"
              >Upload image with .jpg or .png extension</small>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label">Index</label>
          <div class="col-sm">
            <input type="text" class="form-control" id="index" v-model="user.index" />
          </div>
          <div class="col-sm-1"></div>
          <label class="col-form-label">Reg. Number</label>
          <div class="col-sm">
            <input
              type="text"
              class="form-control"
              id="reg"
              placeholder="2016/SP/001"
              v-model="user.reg"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.regb"
            :state="Boolean(user.regb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.regb)"
              :state="Boolean(user.regb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.regb)" :state="Boolean(user.regb)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>

        <div class="form-group row">
          <label class="col-form-label">Full Name</label>
          <div class="col-sm">
            <input
              type="text"
              class="form-control"
              id="name"
              v-model="user.name"
              placeholder="full name"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.nameb"
            :state="Boolean(user.nameb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.nameb)"
              :state="Boolean(user.nameb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.nameb)"
              :state="Boolean(user.nameb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Email</label>
          <div class="col-sm">
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="example@email.com"
              v-model="user.email"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.emailb"
            :state="Boolean(user.emailb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.emailb)"
              :state="Boolean(user.emailb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.emailb)"
              :state="Boolean(user.emailb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
          <label for="inputPassword" class="col-form-label">Password</label>
          <div class="col-sm">
            <input
              type="password"
              class="form-control"
              id="pass"
              v-model="user.pass"
              placeholder="Password"
            />
          </div>
          <div class="col-sm-1"></div>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Mobile</label>
          <div class="col-sm">
            <input
              type="tel"
              class="form-control"
              pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
              id="tel"
              placeholder="0##-###-####"
              v-model="user.tel"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.telb"
            :state="Boolean(user.telb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.telb)"
              :state="Boolean(user.telb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.telb)" :state="Boolean(user.telb)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
          <label class="col-form-label">NIC</label>
          <div class="col-sm">
            <input
              type="tel"
              class="form-control"
              id="nic"
              placeholder="#########v"
              v-model="user.nic"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.nicb"
            :state="Boolean(user.nicb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.nicb)"
              :state="Boolean(user.nicb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.nicb)" :state="Boolean(user.nicb)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Location</label>
          <div class="col-sm">
            <input
              type="text"
              class="form-control"
              id="loc"
              placeholder="Distric"
              v-model="user.loc"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.locb"
            :state="Boolean(user.locb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.locb)"
              :state="Boolean(user.locb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.locb)" :state="Boolean(user.locb)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
          <label class="col-form-label">Date of Birth</label>
          <div class="col-sm">
            <input type="date" class="form-control" id="dob" v-model="user.dob" />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.dobb"
            :state="Boolean(user.dobb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.dobb)"
              :state="Boolean(user.dobb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.dobb)" :state="Boolean(user.dobb)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Course</label>
          <div class="col-sm">
            <input
              type="text"
              class="form-control"
              id="course"
              placeholder="course"
              v-model="user.course"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.courseb"
            :state="Boolean(user.courseb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.courseb)"
              :state="Boolean(user.courseb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.courseb)"
              :state="Boolean(user.courseb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Current Level</label>
          <div class="col-sm">
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
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.levelb"
            :state="Boolean(user.levelb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.levelb)"
              :state="Boolean(user.levelb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.levelb)"
              :state="Boolean(user.levelb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
          <label class="col-form-label">GPA</label>
          <div class="col-sm">
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
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.gpab"
            :state="Boolean(user.gpab)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.gpab)"
              :state="Boolean(user.gpab)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.gpab)" :state="Boolean(user.gpab)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Degree</label>
          <div class="col-sm-6">
            <input
              type="text"
              class="form-control"
              id="degree"
              v-model="user.degree"
              placeholder="Bachelor of Science Honours in Computer Science [BSc Hons (ComputerSc)"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.degreeb"
            :state="Boolean(user.degreeb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.degreeb)"
              :state="Boolean(user.degreeb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.degreeb)"
              :state="Boolean(user.degreeb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
          <label class="col-form-label" id="duration">Duration</label>
          <div class="col-sm">
            <select class="form-control" id v-model="user.duration">
              <option value disabled selected>Select Years</option>
              <option>3 years</option>
              <option>4 years</option>
            </select>
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.durationb"
            :state="Boolean(user.durationb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.durationb)"
              :state="Boolean(user.durationb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.durationb)"
              :state="Boolean(user.durationb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Achievements</label>
          <div class="col-sm">
            <textarea
              class="form-control"
              id="achiev"
              rows="3"
              placeholder="Sports, Leadership"
              v-model="user.achiev"
            ></textarea>
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.achievb"
            :state="Boolean(user.achievb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.achievb)"
              :state="Boolean(user.achievb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.achievb)"
              :state="Boolean(user.achievb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Project - I</label>
          <div class="col-sm">
            <textarea
              class="form-control"
              id="p1"
              rows="3"
              v-model="user.p1"
              placeholder="Description, Languages, Framework, Databases"
            ></textarea>
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.p1b"
            :state="Boolean(user.p1b)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.p1b)"
              :state="Boolean(user.p1b)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.p1b)" :state="Boolean(user.p1b)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Project - II</label>
          <div class="col-sm">
            <textarea
              class="form-control"
              id="p2"
              rows="3"
              v-model="user.p2"
              placeholder="Description, Languages, Framework, Databases"
            ></textarea>
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.p2b"
            :state="Boolean(user.p2b)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.p2b)"
              :state="Boolean(user.p2b)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback v-show="Boolean(user.p2b)" :state="Boolean(user.p2b)">Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">LinkedIn</label>
          <div class="col-sm">
            <input
              type="url"
              class="form-control"
              id="linkedin"
              v-model="user.linkedin"
              placeholder="https://www.linkedin.com/"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            switch
            v-model="user.linkedinb"
            :state="Boolean(user.linkedinb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.linkedinb)"
              :state="Boolean(user.linkedinb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.linkedinb)"
              :state="Boolean(user.linkedinb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <label class="col-form-label">GitHub</label>
          <div class="col-sm">
            <input
              type="url"
              class="form-control"
              id="github"
              v-model="user.github"
              placeholder="https://github.com/"
            />
          </div>
          <b-form-checkbox
            class="col-sm-1 small"
            :value="1"
            id="line"
            switch
            v-model="user.githubb"
            :state="Boolean(user.githubb)"
            name="checkbox-validation"
          >
            <b-form-invalid-feedback
              v-show="!Boolean(user.githubb)"
              :state="Boolean(user.githubb)"
            >Not Verified</b-form-invalid-feedback>
            <b-form-valid-feedback
              v-show="Boolean(user.githubb)"
              :state="Boolean(user.githubb)"
            >Verified</b-form-valid-feedback>
          </b-form-checkbox>
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-success" style="margin-left: 90%">Update</button>
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
      user: {},
      imaging: false
    };
  },
  methods: {
    getData() {
      this.$http
        .get("http://localhost:8000/api/getUserA/" + this.$route.params.index, {
          //this.$route.params.index, {
          headers: {
            Authorization: `Bearer ${localStorage.usertoken}`
          }
        })
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
          swal("Updated", "User details updated", "warning");
        });
    },
    getImage(e) {
      var filereader = new FileReader();
      filereader.readAsDataURL(e.target.files[0]);
      filereader.onload = e => {
        this.user.image = e.target.result;
      };
      this.imaging = true;
    }
  }
};
</script>

<style scoped>
img {
  border-radius: 10px;
  height: 250px;
  width: 100%;
  display: block;
}

.col-form-label {
  text-align: left;
  width: 100px;
}

#duration {
  width: 90px;
}
.container {
  margin-right: 150px;
}
</style>