<template>
<div>
  <SideBar></SideBar>
    <div class="container">
        <form @submit.prevent="submitForm">
            <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 card mb-5 shadow">
                <div class="card-body">
                    <h6 class="card-subtitle text-muted">Profile picture</h6>
                </div>
                <img v-show="user.image" :src="user.image" alt="Card image">
                <img v-show="!user.image" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
                <div class="card-footer text-muted">
                    <b-form-file size="sm" style="text-align: left" placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..." @change="getImage($event)"></b-form-file>
                    <!-- <div class="form-group mb-1">
                        <div class="input-group">
                            <div class="custom-file">                  
                                <input type="file" @change="getImage($event)" class="form-control custom-file-input" name="image" id="inputGroupFile02">
                                <small class="custom-file-label row" for="inputGroupFile02">Choose file</small>
                            </div>
                        </div>
                    </div> -->
                    <small id="fileHelp" class="row form-text text-muted">Upload image with .jpg or .png extension</small>
                </div>                
            </div>
            </div>

            <div class="form-group row">  
                    <label class="col-sm-2 col-form-label">Index</label>
                    
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="index" v-model="user.index">
                    </div>              
                    <label class="col-sm-2 col-form-label">Reg. Number</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" id="reg" placeholder="2016/SP/001" v-model="user.reg">
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
                <div class="col-sm-4">
                <input type="email" class="form-control" id="email" placeholder="example@email.com" v-model="user.email">
                </div>
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                         <input type="password" class="form-control" id="pass" v-model="user.pass" placeholder="Password">
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-4">
                <input type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="tel" placeholder="0##-###-####" v-model="user.tel">
                </div>
                <label class="col-sm-2 col-form-label">NIC</label>
                <div class="col-sm-4">
                <input type="tel" class="form-control" id="nic" placeholder="#########v" v-model="user.nic">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="loc" placeholder="Distric" v-model="user.loc">
                </div>
           
                <label class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-4">
                <input type="date" class="form-control" id="dob" v-model="user.dob">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Course</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="course" placeholder="course" v-model="user.course">
                </div>
                <label class="col-sm-2 col-form-label">Current Level</label>
                <div class="col-sm-auto">
                <select class="form-control" id="level" v-model="user.level">
                    <option value="" disabled selected>Select Level</option>
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
                <input type="number" min="0" max="4" step="0.001" class="form-control" id="gpa" placeholder="4.00" v-model="user.gpa">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Degree</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" id="degree" v-model="user.degree" placeholder="Bachelor of Science Honours in Computer Science [BSc Hons (ComputerSc)">
                </div>
                    <label class="col-sm-1 col-form-label">Duration</label>
                    <div class="col-sm-2">
                    <select class="form-control" id="duration" v-model="user.duration">
                    <option value="" disabled selected>Select Years</option>
                    <option>3 years</option>
                    <option>4 years</option>
                    </select>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Achievements</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="achiev" rows="3" placeholder="Sports, Leadership" v-model="user.achiev"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project - I</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="p1" rows="3" v-model="user.p1" placeholder="Description, Languages, Framework, Databases"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project - II</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="p2" rows="3" v-model="user.p2" placeholder="Description, Languages, Framework, Databases"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">LinkedIn</label>
                <div class="col-sm-10">
                <input type="url" class="form-control" id="linkedin" v-model="user.linkedin" placeholder="https://www.linkedin.com/">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">GitHub</label>
                <div class="col-sm-10">
                <input type="url" class="form-control" id="github" v-model="user.github" placeholder="https://github.com/">
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary" style="margin-left: 90%">Add User</button>
            </div>
            
        </form>     
    </div>
</div>
</template>

<style scoped>
img{
  border-radius: 10px;
  height: 250px;
  width: 100%;
  display: block;
}

label{
  text-align: left;
}
</style>


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
                reg:'',
                name:'',
                email:'',
                pass:'',
                tel:'',
                nic:'',
                loc:'',
                dob:'',
                course:'',
                level:'',
                gpa:'',
                degree:'',
                duration:'',
                achiev:'',
                p1:'',
                p2:'',
                linkedin:'https://www.linkedin.com/',
                github:'https://github.com/',
                image:''
            }
        }
    },
    methods:{
        submitForm(){
            this.$http.post("http://localhost:8000/api/addUser",this.user)
            .then(function(response){
                this.$router.push('/users')
            })   
        },
        getImage(e){
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0]);
            filereader.onload = (e)=>{
                this.user.image = e.target.result;
            }
        }
    }
 }
</script>

