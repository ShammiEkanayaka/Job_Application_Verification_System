<template>

    <div class="container">

      <form>
        <fieldset>
          <legend>My Account</legend>

            <div class="form-group">
            <label for="exampleTextarea">Name : </label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
          </div>

          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Registration Number : </label>  
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email Address : </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Phone Number : </label>
            <input type="text" value="wrong value" class="form-control is-invalid" id="inputInvalid">
            <div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
          </div>

          <div class="form-group">
            <label for="exampleTextarea">University : </label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="exampleTextarea">Faculty : </label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
          </div>

          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Degree : </label>
          </div>

          </fieldset>

</form>
</div>
</template>

<script>

</script>
