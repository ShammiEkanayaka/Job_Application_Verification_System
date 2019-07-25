<template>
   <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" @click="$router.push('register')">Sign up</button>
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </form>
            <div class="text-center"  >
              <a class="small" href="#" v-on:click="forget">Forgot password?</a>
            </div>
            <p style="text-align:center; font-size:11px;">COPYRIGHT © 2015-2019
              <br>FACULTY OF SCIENCE. 
              <br>UNIVERSITY OF JAFFNA. 
              <br>ALL RIGHTS RESERVED.</p>
                  
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  methods: {
    forget: function () {
      alert('Please contact your system administrator')
    }
  }
}
</script>

<style>

</style>
