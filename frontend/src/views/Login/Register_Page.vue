<template>
<div>
  <body>
    <div class="col-12 bg">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-3 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center" id="register">Register</h5>
              <ValidationObserver ref="observer" v-slot="{ passes }">
                <form class="form-signin" @submit.prevent="passes(submitForm)">
                  <validation-provider
                    :rules="{ regex: /^S-[0-9]{4}$/ }"
                    v-slot="{ valid, errors }"
                  >
                    <div class="form-label-group">
                      <input
                        type="text"
                        id="inputUserame"
                        class="form-control"
                        placeholder="Username"
                        :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                        required
                        v-model="user.index"
                      />
                      <div id="index" class="valid-feedback text-left">Looks Good</div>
                      <div id="index" class="invalid-feedback text-left">{{ errors[0] }}</div>

                      <label for="inputUserame">Index</label>
                    </div>
                  </validation-provider>
                  <validation-provider
                    :rules="{ regex: /^[0-9]{4}[/](SP|CSC)[/][0-9]{3}$/ }"
                    v-slot="{ valid, errors }"
                  >
                    <div class="form-label-group">
                      <input
                        type="text"
                        id="inputNumber"
                        class="form-control"
                        placeholder="Email address"
                        required
                        :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                        v-model="user.reg"
                      />
                      <div id="index" class="valid-feedback text-left">Looks Good</div>
                      <div id="index" class="invalid-feedback text-left">{{ errors[0] }}</div>

                      <label for="inputNumber">Reg. Number</label>
                    </div>
                  </validation-provider>
                  <validation-provider rules="required|email" v-slot="{ valid, errors }">
                    <div class="form-label-group">
                      <input
                        type="text"
                        id="inputConfirmPassword"
                        class="form-control"
                        placeholder="Email"
                        :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                        v-model="user.email"
                      />
                      <div id="email" class="valid-feedback text-left">Looks Good</div>
                      <div id="email" class="invalid-feedback text-left">{{ errors[0] }}</div>
                      <label for="inputConfirmPassword">Email Address</label>
                    </div>
                  </validation-provider>
                  <validation-provider
                    rules="required|max:255|alpha_spaces"
                    v-slot="{ valid, errors }"
                  >
                    <div class="form-label-group">
                      <input
                        type="text"
                        id="inputEmail"
                        class="form-control"
                        placeholder="Email address"
                        :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                        v-model="user.name"
                      />
                      <div id="level" class="valid-feedback text-left">Looks Good</div>
                      <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
                      <label for="inputEmail">Full name</label>
                    </div>
                  </validation-provider>
                  <hr />
                  <validation-provider rules="required|min:6" v-slot="{ valid, errors }" vid="confirmation">
                    <div class="form-label-group">
                      <input
                        type="password"
                        id="inputPassword"
                        class="form-control"
                        placeholder="Password"
                        :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                        v-model="user.pass"
                      />
                      <div id="level" class="valid-feedback text-left">Looks Good</div>
                      <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
                      <label for="inputPassword">Password</label>
                    </div>
                  </validation-provider>
                  <validation-provider rules="required|confirmed:confirmation" v-slot="{ valid, errors }">
                    <div class="form-label-group">
                      <input
                        type="password"
                        id="confirmPassword"
                        class="form-control"
                        v-model="confirmation"
                        placeholder="Confirm Password"
                        :class="errors[0] ? 'is-invalid' : (valid ? 'is-valid' : null)"
                      />
                      <div id="level" class="valid-feedback text-left">Looks Good</div>
                      <div id="level" class="invalid-feedback text-left">{{ errors[0] }}</div>
                      <label for="confirmPassword">Confirm Password</label>
                    </div>
                  </validation-provider>
                  <button
                    class="btn btn-lg btn-primary btn-block text-uppercase"
                    type="submit"
                  >Register</button>
                  <p style="text-align:center; font-size:11px;">Already a member?</p>
                  <p id="sm"></p>
                  <button
                    class="btn btn-lg btn-primary btn-block text-uppercase"
                    type="button"
                    @click="$router.push('/login')"
                  >Login</button>
                  <p style="text-align:center; font-size:11px;">
                    COPYRIGHT © 2015-2019
                    <br />FACULTY OF SCIENCE.
                    <br />UNIVERSITY OF JAFFNA.
                    <br />ALL RIGHTS RESERVED.
                  </p>
                </form>
              </ValidationObserver>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        index: "S-",
        reg: "",
        name: "",
        email: "",
        pass: ""
      }
    };
  },
  created() {
    this.scrollToTop();
  },
  methods: {
    submitForm() {
      this.$http
        .post("http://localhost:8000/api/addUser", this.user)
        .then(function(response) {
          swal({
            title: "Registered",
            text:
              "Please contact system administrator to activate your account",
            icon: "success",
            button: "Ok"
          });
          this.user='';
          this.$router.push("/login");
        })
        .catch(error => {
          if (error.status === 422) {
            swal({
              title: "Invalied Input",
              text: "The index or register has already been registered",
              icon: "warning",
              button: "Ok"
            });
          }
        });
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    }
  }
};
</script>

<style>
.sm {
  text-align: center;
}

.bg {
  background-image: url("https://webfoundation.org/docs/2017/03/March-12-Letter.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.text-center {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: 0.1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group > input,
.form-label-group > label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: 0.25rem;
  transition: all 0.1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>