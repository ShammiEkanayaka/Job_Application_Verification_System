<template>
<div>
  <SideBar></SideBar>
  <div class="container">
        <form @submit.prevent="submitForm">
            <div class="form-group row">  
                    <label class="col-sm-2 col-form-label">Index</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="index" v-model="user.index">
                    </div>              
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                         <input type="password" class="form-control" id="pass" v-model="user.pass" placeholder="Password">
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" v-model="user.name" placeholder="full name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="example@email.com">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-4">
                <input type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="tel" placeholder="0##-###-####">
                </div>
                <label class="col-sm-2 col-form-label">NIC</label>
                <div class="col-sm-4">
                <input type="tel" class="form-control" id="nic" placeholder="#########v">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="loc" placeholder="Distric">
                </div>
           
                <label class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-4">
                <input type="date" class="form-control" id="dob">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Course</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="course" placeholder="course">
                </div>
                <label class="col-sm-1 col-form-label">GPA</label>
                <div class="col-sm-2">
                <input type="number" class="form-control" id="gpa" placeholder="4.00">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Degree</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="degree" placeholder="Bachelor of Science Honours in Computer Science [BSc Hons (ComputerSc)">
                </div>
                    <label class="col-sm-2 col-form-label">Duration</label>
                    <div class="col-sm-1">
                    <select class="form-control" id="duration">
                    <option>3</option>
                    <option>4</option>
                    </select>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Achievements</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="achiev" rows="3" placeholder="Sports, Leadership"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project - I</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="p1" rows="3" placeholder="Description, Languages, Framework, Databases"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project - II</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="p2" rows="3" placeholder="Description, Languages, Framework, Databases"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">LinkedIn</label>
                <div class="col-sm-10">
                <input type="url" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">GitHub</label>
                <div class="col-sm-10">
                <input type="url" class="form-control" id="github" placeholder="https://github.com/">
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary" style="margin-left: 90%">Add New User</button>
            </div>
            
        </form>     
    </div>
</div>
</template>

<script>
import SideBar from '@/components/Side_Bar.vue'
export default {
     components:{
       SideBar
     },

     data(){
        return{
            user:{
                index:'S-',
                pass:'',
                name:''
            }
        }
    },
    methods:{
        submitForm(){
            this.$http.post("http://localhost:8000/api/addUser",this.user)
            .then(function(response){
                this.$router.push('/users')
            })   
        }
    }
 }
</script>