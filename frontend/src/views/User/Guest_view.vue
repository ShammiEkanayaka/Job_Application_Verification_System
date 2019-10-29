<template>
  <div class="col-12 bg container">
    <div class="container" id="contain">
      <form @submit.prevent="updateInfo">
        <div v-show="user.image" class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4 card mb-5 shadow">
            <div class="card-body">
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
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Index</label>
          <div class="col-sm">
            <input type="text" readonly class="form-control is-valid" id="index" v-model="user.index" />
            <div class="valid-feedback text-right">Unique</div>
          </div>
          <label class="col-form-label">Reg. Number</label>
          <div class="col-sm">
            <input
              type="text"
              class="form-control"
              id="reg"
              placeholder="2016/SP/001"
              readonly
              v-model="user.reg"
              :class="reg"
            />
            <div class="valid-feedback text-right">Unique</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label">Full Name</label>
          <div class="col-sm">
            <input
              type="text"
              class="form-control"
              id="name"
              v-model="user.name"
              readonly
              :class="name"
              placeholder="full name"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Email</label>
          <div class="col-sm">
            <input
              type="email"
              class="form-control"
              readonly
              id="email"
              placeholder="example@email.com"
              v-model="user.email"
              :class="email"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.tel" class="col-form-label">Mobile</label>
          <div class="col-sm" v-show="user.tel">
            <input
              type="tel"
              class="form-control"
              pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
              readonly
              id="tel"
              placeholder="0##-###-####"
              v-model="user.tel"
              :class="tel"
            />
            <div id="tel" class="valid-feedback text-right">Verified</div>
            <div id="tel" class="invalid-feedback text-right">Not Verified</div>
          </div>
          <label v-show="user.nic" class="col-form-label">NIC</label>
          <div v-show="user.nic" class="col-sm">
            <input
              type="tel"
              class="form-control"
              id="nic"
              placeholder="#########v"
              readonly
              v-model="user.nic"
              :class="nic"
            />
            <div id="nic" class="valid-feedback text-right">Verified</div>
            <div id="nic" class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.loc" class="col-form-label">Location</label>
          <div v-show="user.loc" class="col-sm">
            <input
              type="text"
              class="form-control"
              id="loc"
              placeholder="Distric"
              readonly
              v-model="user.loc"
              :class="loc"
            />
            <div id="loc" class="valid-feedback text-right">Verified</div>
            <div id="loc" class="invalid-feedback text-right">Not Verified</div>
          </div>
          <label v-show="user.dob" class="col-form-label">Date of Birth</label>
          <div v-show="user.dob" class="col-sm">
            <input type="date" class="form-control" readonly id="dob" v-model="user.dob" :class="dob" />
            <div id="dob" class="valid-feedback text-right">Verified</div>
            <div id="dob" class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.course" class="col-form-label">Course</label>
          <div v-show="user.course" class="col-sm">
            <input
              type="text"
              class="form-control"
              id="course"
              readonly
              placeholder="course"
              v-model="user.course"
              :class="course"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.level" class="col-form-label">Current Level</label>
          <div v-show="user.level" class="col-sm">
            <input class="form-control" id="level" readonly v-model="user.level" :class="level"/>
            <div id="level" class="valid-feedback text-right">Verified</div>
            <div id="level" class="invalid-feedback text-right">Not Verified</div>
          </div>
          <label v-show="user.gpa" class="col-form-label">GPA</label>
          <div v-show="user.gpa" class="col-sm">
            <input
              type="number"
              min="0"
              max="4"
              step="0.001"
              readonly
              class="form-control"
              id="gpa"
              placeholder="4.00"
              v-model="user.gpa"
              :class="gpa"
            />
            <div id="gpa" class="valid-feedback text-right">Verified</div>
            <div id="gpa" class="invalid-feedback text-right">Not Verified</div>
          </div>
          <label v-show="user.duration" class="col-form-label">Duration</label>
          <div v-show="user.duration" class="col-sm">
            <input class="form-control" id="duration" readonly v-model="user.duration" :class="duration"/>
            <div id="duration" class="valid-feedback text-right">Verified</div>
            <div id="duration" class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.degree" class="col-form-label">Degree</label>
          <div v-show="user.degree" class="col-sm">
            <input
              type="text"
              class="form-control"
              readonly
              id="degree"
              v-model="user.degree"
              placeholder="Bachelor of Science Honours in Computer Science [BSc Hons (ComputerSc)"
              :class="degree"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.achiev" class="col-form-label">Achievements</label>
          <div v-show="user.achiev" class="col-sm">
            <textarea
              class="form-control"
              id="achiev"
              rows="3"
              readonly
              placeholder="Sports, Leadership"
              v-model="user.achiev"
              :class="achiev"
            ></textarea>
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.p1" class="col-form-label">Project - I</label>
          <div v-show="user.p1" class="col-sm">
            <textarea
              class="form-control"
              id="p1"
              rows="3"
              readonly
              v-model="user.p1"
              placeholder="Description, Languages, Framework, Databases"
              :class="p1"
            ></textarea>
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.p2" class="col-form-label">Project - II</label>
          <div v-show="user.p2" class="col-sm">
            <textarea
              class="form-control"
              id="p2"
              readonly
              rows="3"
              v-model="user.p2"
              placeholder="Description, Languages, Framework, Databases"
              :class="p2"
            ></textarea>
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.linkedin" class="col-form-label">LinkedIn</label>
          <div v-show="user.linkedin" class="col-sm">
            <input
              type="url"
              class="form-control"
              id="linkedin"
              readonly
              v-model="user.linkedin"
              placeholder="https://www.linkedin.com/"
              :class="linkedin"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.github" class="col-form-label">GitHub</label>
          <div v-show="user.github" class="col-sm">
            <input
              type="url"
              class="form-control"
              id="github"
              readonly
              v-model="user.github"
              placeholder="https://github.com/"
              :class="github"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
        <div class="form-group row">
          <label v-show="user.facebook" class="col-form-label">Facebook</label>
          <div v-show="user.facebook" class="col-sm">
            <input
              type="url"
              class="form-control"
              readonly
              id="facebook"
              v-model="user.facebook"
              placeholder="https://facebook.com/"
              :class="facebook"
            />
            <div class="valid-feedback text-right">Verified</div>
            <div class="invalid-feedback text-right">Not Verified</div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
.bg {
  background-image: url("https://webfoundation.org/docs/2017/03/March-12-Letter.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.container {
  padding-top: 50px;
  padding-bottom: 50px;
  border-radius: 10px;
  margin-right: 150px;
}

#contain {
  background-color: rgba(255, 255, 255, 0.644);
  padding-top: 50px;
  border-radius: 10px;
  margin-left: 150px;
  padding-left: 40px;
  padding-right: 20px;
}

img {
  border-radius: 10px;
  height: 250px;
  width: 100%;
  display: block;
}

.col-form-label {
  text-align: left;
  font-weight: bold;
  color: black;
  width: 104px;
}

.form-control {
  color: black;
}

.card-body {
  padding-left: 5px;
  padding-right: 5px;
}
#index, #reg, #tel, #nic, #loc, #dob {
  width: 421px;
}
#duration, #gpa, #level {
  width: 225px;
}
</style>

<script>
export default {
  created() {
    this.scrollToTop();
    this.getData();
  },
  data() {
    return {
      user: {},
      imaging: false
    };
  },
  computed: {
    reg() {
      if (this.user.regb) return "is-valid";
      return "is-invalid";
    },
    name() {
      if (this.user.nameb) return "is-valid";
      return "is-invalid";
    },
    email() {
      if (this.user.emailb) return "is-valid";
      return "is-invalid";
    },
    tel() {
      if (this.user.telb) return "is-valid";
      return "is-invalid";
    },
    nic() {
      if (this.user.nicb) return "is-valid";
      return "is-invalid";
    },
    loc() {
      if (this.user.locb) return "is-valid";
      return "is-invalid";
    },
    dob() {
      if (this.user.dobb) return "is-valid";
      return "is-invalid";
    },
    course() {
      if (this.user.courseb) return "is-valid";
      return "is-invalid";
    },
    level() {
      if (this.user.levelb) return "is-valid";
      return "is-invalid";
    },
    gpa() {
      if (this.user.gpab) return "is-valid";
      return "is-invalid";
    },
    degree() {
      if (this.user.degreeb) return "is-valid";
      return "is-invalid";
    },
    duration() {
      if (this.user.durationb) return "is-valid";
      return "is-invalid";
    },
    achiev() {
      if (this.user.achievb) return "is-valid";
      return "is-invalid";
    },
    p1() {
      if (this.user.p1b) return "is-valid";
      return "is-invalid";
    },
    p2() {
      if (this.user.p2b) return "is-valid";
      return "is-invalid";
    },
    linkedin() {
      if (this.user.linkedinb) return "is-valid";
      return "is-invalid";
    },
    github() {
      if (this.user.githubb) return "is-valid";
      return "is-invalid";
    },
    facebook() {
      if (this.user.facebookb) return "is-valid";
      return "is-invalid";
    }
  },
  methods: {
    getData() {
      this.$http
        .get("http://localhost:8000/api/guestUser/" + this.$route.params.index)
        .then(function(response) {
          if(response.body["0"].user === null){
            this.$router.push('/');
          }
          else{
            this.user = response.body["0"].user;
          } 
        });
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    }
  }
};
</script>