<template>
<div>
  <body>
    <div class="col-12 bg">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-3 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Admin Login</h5>
              <form class="form-signin" @submit.prevent="submitForm">
                <div class="form-label-group">
                  <input
                    type="email"
                    id="inputEmail"
                    class="form-control"
                    placeholder="Email address"
                    required
                    autofocus
                    v-model="user.email"
                  />
                  <label for="inputEmail">Email</label>
                </div>

                <div class="form-label-group">
                  <input
                    type="password"
                    id="inputPassword"
                    class="form-control"
                    placeholder="Password"
                    required
                    v-model="user.password"
                  />
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" />
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <hr class="my-4" />
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                <button @click="$router.push('/login')" class="btn btn-lg btn-primary btn-block text-uppercase" type="button">User Login</button>
              </form>
              <p style="text-align:center; font-size:11px;">
                COPYRIGHT © 2015-2019
                <br />FACULTY OF SCIENCE.
                <br />UNIVERSITY OF JAFFNA.
                <br />ALL RIGHTS RESERVED.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</div>
</template>

<script>
//import EventBus from "@/EventBus";

export default {
  data() {
    return {
      user: {
        email: "",
        password: ""
      }
    };
  },
  created() {
    this.scrollToTop();
  },
  methods: {
    submitForm() {
      this.$http
        .post("http://localhost:8000/api/admin/login", this.user)
        .then(function(response) {
          var res = response.body.token.token.name.split("-", 1);
          //console.log(response.body.token.accessToken);
          localStorage.setItem("usertoken", response.body.token.accessToken);
          localStorage.setItem("email", res[0]);
          //this.emitMethod();
          this.$store.commit('updateEmail', localStorage.getItem('email'));
          this.$router.push("/users");
        });
    },
    /* emitMethod() {
      EventBus.$emit("logged-in", "adminlog");
    }, */
    scrollToTop() {
      window.scrollTo(0, 0);
    }
  }
};
</script>

<style>
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

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
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