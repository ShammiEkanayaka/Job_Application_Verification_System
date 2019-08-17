<template>
    <div>
        <div class="container">
        <h2>Edit Profile</h2>
                     
            <form>
                <div class="form-row">

                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Name</label>
                    <input type="text" 
                        name="name"
                        class="form-control" 
                        id="validationCustom01" 
                        placeholder="First name" 
                        value="name" 
                        v-validate="'required'"
                    >  

                        <div v-show="errors.has('name')" class="help-block alert alert-danger">
                            {{ errors.first('name')}}
                        </div>
                    </div>
                  
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Phone Number</label>
                    <input type="text"
                        name="phone number"  
                        class="form-control" 
                        id="validationCustom01" 
                        placeholder="First name" 
                        value="phone number" 
                        v-validate="'required|max:10'"
                    >  

                        <div v-show="errors.has('phone number')" class="help-block alert alert-danger">
                            {{ errors.first('phone number')}}
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>


                <button type="submit" class="btn btn-primary">Save</button>

                </form>

    </div>
    </div>
</template>
