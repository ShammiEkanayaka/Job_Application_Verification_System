<template>
  <div class="col-12 bg container">
    <div class="container" id="contain">
      <ValidationObserver ref="observer" v-slot="{ passes }">
        <form @submit.prevent="passes(submitForm)">
          <div class="row">
            <div class="col-sm-4"><h1>ADD USER</h1></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 card mb-5 shadow">
              <div class="card-body">
                <h6 class="card-subtitle text-muted">Profile picture</h6>
              </div>
              <img v-show="user.image" :src="user.image" alt="Card image" />
              <img
                v-show="!user.image"
                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                alt="Card image"
              />
              <div class="card-footer text-muted">
                <validation-provider
                  rules="mimes:image/jpeg,image/jpg,image/png"
                  v-slot="{ valid, errors, validate }"
                >
                  <b-form-file
                    class="input"
                    size="sm"
                    style="text-align: left"
                    placeholder="Choose a file ..."
                    v-on:change="validate"
                    @change="getImage($event)"
                  />
                  <button type="button" @click="remove()" class="btn btn-danger tiny" style="margin-left: 80%">Remove</button>
                  <small
                    id="fileHelp"
                    class="row form-text text-muted"
                  >Upload image with .jpg or .png extension</small>
                  <div id="index" class="valid-feedback text-left">Looks Good</div>
                  <div
                    id="index"
                    v-show="errors[0] ? true : (valid ? false : false)"
                    class="text text-danger small text-left"
                  >{{ errors[0] }}</div>
                </validation-provider>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Index</label>
            <div class="col-sm">
              <validation-provider :rules="{ regex: /^S-[0-9]{4}$/ }" v-slot="{ valid, errors }">
                <input
                  type="text"
                  class="form-control"
                  required
                  :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                  name="index"
                  id="index"
                  v-model="user.index"
                />
                <div id="index" class="valid-feedback text-left">Looks Good</div>
                <div id="index" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
            <label class="col-form-label">Reg. Number</label>
            <div class="col-sm">
              <validation-provider
                :rules="{ regex: /^[0-9]{4}[/](SP|CSC)[/][0-9]{3}$/ }"
                v-slot="{ valid, errors }"
              >
                <input
                  required
                  class="form-control"
                  id="reg"
                  placeholder="2016/SP/001"
                  v-model="user.reg"
                  :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                />
                <div id="level" class="valid-feedback text-left">Looks Good</div>
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label">Full Name</label>
            <div class="col-sm">
              <validation-provider rules="required|max:255|alpha_spaces" v-slot="{ valid, errors }">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                  v-model="user.name"
                  placeholder="full name"
                />
                <div id="level" class="valid-feedback text-left">Looks Good</div>
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Email</label>
            <div class="col-sm">
              <validation-provider rules="required|email" v-slot="{ valid, errors }">
                <input
                  class="form-control"
                  :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                  id="email"
                  placeholder="example@email.com"
                  v-model="user.email"
                />
                <div id="email" class="valid-feedback text-left">Looks Good</div>
                <div id="email" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
            <label for="inputPassword" class="col-form-label">Password</label>
            <div class="col-sm">
              <validation-provider rules="required|min:6" v-slot="{ valid, errors }">
                <input
                  :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                  type="password"
                  class="form-control"
                  id="pass"
                  v-model="user.pass"
                  placeholder="Password"
                />
                <div id="level" class="valid-feedback text-left">Looks Good</div>
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Mobile</label>
            <div class="col-sm">
              <validation-provider
                :rules="{ regex: /^[0-9]{3}-[0-9]{7}$/ }"
                v-slot="{ valid, errors }"
              >
                <input
                  type="tel"
                  class="form-control"
                  id="tel"
                  placeholder="0##-#######"
                  v-model="user.tel"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                />
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
            <label class="col-form-label">NIC</label>
            <div class="col-sm">
              <validation-provider
                :rules="{ regex: /(^[0-9]{9}v$|^[0-9]{12})$/ }"
                v-slot="{ valid, errors }"
              >
                <input
                  class="form-control"
                  id="nic"
                  placeholder="#########v"
                  v-model="user.nic"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                />
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Location</label>
            <div class="col-sm">
              <validation-provider rules="alpha_spaces|max:255" v-slot="{ valid, errors }">
                <input
                  type="text"
                  class="form-control"
                  id="loc"
                  placeholder="Distric"
                  v-model="user.loc"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                />
                <div id="loc" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
            <label class="col-form-label">Date of Birth</label>
            <div class="col-sm">
              <input type="date" class="form-control" id="dob" v-model="user.dob" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Course</label>
            <div class="col-sm">
              <select class="form-control" id="course" placeholder="course" v-model="user.course">
                <option value disabled selected>Select Course</option>
                <option>Direct-Intake Computer Science</option>
                <option>Physical Science</option>
                <option value>Remove</option>
              </select>
            </div>
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
                <option>4X</option>
                <option value>Remove</option>
              </select>
            </div>
            <label class="col-form-label">GPA</label>
            <div class="col-sm">
              <validation-provider rules="between:0,4" v-slot="{ valid, errors }">
                <input
                  type="number"
                  step="0.01"
                  class="form-control"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                  id="gpa"
                  placeholder="4.00"
                  v-model="user.gpa"
                />
                <div id="loc" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
            <label class="col-form-label" id="duration">Duration</label>
            <div class="col-sm">
              <select class="form-control" id v-model="user.duration">
                <option value disabled selected>Select Years</option>
                <option>3 years</option>
                <option>4 years</option>
                <option value>Remove</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Degree</label>
            <div class="col-sm">
              <select class="form-control" id="degree" v-model="user.degree">
                <option value disabled selected>Select Degree</option>
                <option>Bachelor of Science in Computer Science</option>
                <option>Bachelor of Science Honours in Computer Science</option>
                <option>Bachelor of Science</option>
                <option>Bachelor of Science Honours in Computer Science</option>
                <option>Bachelor of Science Honours in Applied Science in Computing</option>
                <option value>Remove</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Achievements</label>
            <div class="col-sm">
              <validation-provider rules="max:255" v-slot="{ valid, errors }">
                <textarea
                  class="form-control"
                  id="achiev"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                  rows="3"
                  placeholder="Sports, Leadership"
                  v-model="user.achiev"
                ></textarea>
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Project - I</label>
            <div class="col-sm">
              <validation-provider rules="max:255" v-slot="{ valid, errors }">
                <textarea
                  class="form-control"
                  id="p1"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                  rows="3"
                  v-model="user.p1"
                  placeholder="Description, Languages, Framework, Databases"
                ></textarea>
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Project - II</label>
            <div class="col-sm">
              <validation-provider rules="max:255" v-slot="{ valid, errors }">
                <textarea
                  class="form-control"
                  id="p2"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                  rows="3"
                  v-model="user.p2"
                  placeholder="Description, Languages, Framework, Databases"
                ></textarea>
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">LinkedIn</label>
            <div class="col-sm">
              <validation-provider
                :rules="{ regex: /^https:[/][/]www.linkedin.com[/]/ }"
                v-slot="{ valid, errors }"
              >
                <input
                  class="form-control"
                  id="linkedin"
                  v-model="user.linkedin"
                  placeholder="https://www.linkedin.com/"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                />
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">GitHub</label>
            <div class="col-sm">
              <validation-provider
                :rules="{ regex: /^https:[/][/]www.github.com[/]/ }"
                v-slot="{ valid, errors }"
              >
                <input
                  type="url"
                  class="form-control"
                  id="github"
                  v-model="user.github"
                  placeholder="https://www.github.com/"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                />
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label">Facebook</label>
            <div class="col-sm">
              <validation-provider
                :rules="{ regex: /^https:[/][/]www.facebook.com[/]/ }"
                v-slot="{ valid, errors }"
              >
                <input
                  class="form-control"
                  id="facebook"
                  v-model="user.facebook"
                  placeholder="https://www.facebook.com/"
                  :class="errors[0] ? 'is-invalid' : (valid ? null : null)"
                />
                <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
              </validation-provider>
            </div>
          </div>
          <div class="form-group row">
            <button type="submit" class="btn btn-primary" style="margin-left: 90%">Add User</button>
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>

<style scoped>
.tiny {
    font-size : 10px; 
    width: 50px;
    height: 20px;
    border: 0 none transparent;
    padding:0.5px;
    margin:0;
}

.bg {
  background-image: url("https://webfoundation.org/docs/2017/03/March-12-Letter.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.container {
  padding-top: 50px;
  border-radius: 10px;
}

#contain {
  background-color: rgba(195, 255, 250, 0.774);
  padding-top: 50px;
  border-radius: 10px;
  margin-left: 150px;
  padding-left: 30px;
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
  width: 100px;
}

#duration {
  width: 90px;
}

h1{
  color: rgb(83, 83, 83);
}
</style>


<script>
export default {
  created() {
    this.scrollToTop();
  },
  data() {
    return {
      user: {
        index: "S-",
        reg: "",
        name: "",
        email: "",
        pass: "",
        tel: "",
        nic: "",
        loc: "",
        dob: "",
        course: "",
        level: "",
        gpa: "",
        degree: "",
        duration: "",
        achiev: "",
        p1: "",
        p2: "",
        linkedin: "",
        github: "",
        facebook: "",
        image: ""
      }
    };
  },
  methods: {
    submitForm() {
      this.$http
        .post("http://localhost:8000/api/addUser", this.user)
        .then(function(response) {
          this.$router.push("/users");
          swal("Success", "New student added", "success");
        });
    },
    getImage(e) {
      console.log(e.target.value);
      var filereader = new FileReader();
      filereader.readAsDataURL(e.target.files[0]);
      filereader.onload = e => {
        this.user.image = e.target.result;
      };
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    },
    remove() {
      this.user.image = null;
    }
  }
};
</script>

