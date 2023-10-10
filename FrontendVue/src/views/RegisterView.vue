<template>
    <div class="container mt-5 pt-5 text-center">
        <div class="row">
          <div class="col-12 col-sm-7 col-md-6 m-auto">
  
            <!-- form card begins down here -->
              <div class="card border-0 shadow">
                <div class="card-body">     
                  <!-- <svg class="mx-auto my-3 col-12 " xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg> -->
                  <h3 style="color: teal;">Register</h3> 
                  <p> Create your account to get full access</p> <br>
  
                  <!-- form starts down here -->
                  <form id="RegisterForm" @submit.prevent="submitForm" >

                    <!-- fullname container -->
                     <input type="text" name="fname" id="FitsName" class="form-control " placeholder="Full Name" v-model="formData.name"/>
                     <!-- <div v-if="!$v.formData.name.$di<div v-show="error.name !== ''">{{error.name}}</div>ty || !$v.formData.name.required">Name is required.</div> -->
                     <div class="alert alert-danger" v-show="error.name !== ''">{{error.name}}</div>
              
                    <!-- email -->
                    <input type="text" name="email" id="Email" class="form-control my-4 py-2" placeholder="email" v-model="formData.email" />   
                    <div class="alert alert-danger" v-show="error.email !== ''">{{error.email}}</div>

                    <!-- pasword input -->
                    <div class="form-outline ">
                        <input  :type="showPassword ? 'text' : 'password'" name="pass" id="password" class="form-control my-4 py-2 " placeholder="Password"  v-model="formData.password" @input="validatePasswordStrength"/>
                        <!-- eye-icon -->
                        <span class="eye-icon" @click="showPassword = !showPassword">
                          <i class="fa fa-eye" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </span>
                          <!-- password stregnth validaotr -->
                        <div  class=" text-danger"> {{ passwordStrengthMessage }} </div>
                         
                    <div class="alert alert-danger" v-show="error.password !== ''">{{this.error.password}}</div> <!--Password length response-->
                    <!-- confirm Passpowrd -->
                        <input :type="showPassword ? 'text' : 'password'" name="pass2" id="confirmPassword" class="form-control my-4 py-2" placeholder="Confirm Password" v-model="formData.ConfirmPassword" @input="ConfirmPassword"/> 
                        <!-- <div class="alert alert-danger" v-show="error.ConfirmPassword!== ''">{{this.error.ConfirmPassword}} This field is required.</div>  -->
                        <div class="alert alert-danger" v-show="error.ConfirmPassword!== ''" > {{ this.error.ConfirmPassword}}</div>
                    </div>
    
                    <!-- PhoneNumber -->
                    <input type="tel" name="PhoneNumber" id="PhoneNumber" class="form-control my-4 py-2" placeholder="Phone Number" v-model="formData.PhoneNumber" />
                    <div class="alert alert-danger" v-show="error.PhoneNumber !== ''">{{error.PhoneNumber}}</div>

                    <!-- Address -->
                    <input type="text" name="Address" id="Address" class="form-control my-4 py-2" placeholder="Address (P.0 BOX number)" v-model="formData.address" />
                    <div class="alert alert-danger" v-show="error.address !== ''">{{error.address}}</div>
        
                    <!-- radio for role -->
                    <div  style="color:  teal;" class="form-check">
                        <input   class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="author" v-model="formData.role">
                        <label class="form-check-label" for="flexRadioDefault1">
                            logIn as an Author
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="reader" v-model="formData.role">
                        <label class="form-check-label" for="flexRadioDefault2">
                          Login as a Reader
                        </label>
                    </div>
                    <div class="alert alert-danger" v-show="error.role !== ''">{{error.role}}</div>

                    
                    <!-- button and router link  is down here-->
                    <div class="">
                      <!-- <router-link to="/LoginForm"> </router-link> -->
                      <button type="submit" name="submit" style="background-color: teal; border:none;" class="btn btn-primary col-4 w3-teal border-0">SignUp</button>
                      <router-link to="/login">
                        <p class="custom-link" style="color: teal;">Already have an account?</p>
                      </router-link>
                    </div>
                  </form>
                  <!-- from ends here -->
                </div>
              </div>
              <!-- form card ends here -->
            </div> 
          </div>
        </div>

</template>
<script>
import axios from "axios";
  // import { useRouter } from "vue-router";
  import validator from "../../src/helpers/validator.js"

  export default {
    data() {
      return {
        apiResponseName: '',
        apiResponseEmail: '',
        apiResponseLastName: '',
        apiResponseUserName: '',
        apiResponsePassword: '',
        apiResponsePhoneNUmber: '',
        ErrorMessage:'',
        showPassword: false,
         // Add password strength related properties
        passwordStrengthMessage: '',
        // userRole: '',
        
        formData: {
          name: '',
          email: '',
          password: '',
          address: '',
          PhoneNumber: '',
          ConfirmPassword:'',
          role: '' //default value
          
        },
        error: {
          name: '',
          email: '',
          password: '',
          address: '',
          PhoneNumber: '',
          ConfirmPassword:'',
          role:''          
        },
      };
     
    },
  
    methods: {
      resetForm() {
        this.formData.name = '';
        this.formData.email = '';
        this.formData.password = '';
        this.formData.address = '';
        this.formData.PhoneNumber = '';
        this.formData.ConfirmPassword = '';
        this.formData.role = '';
      },
      clearErrors() {
        this.formData.name = '';
        this.formData.email = '';
        this.formData.password = '';
        this.formData.address = '';
        this.formData.PhoneNumber = '';
        this.formData.ConfirmPassword = '';
        this.formData.role = '';
      },
      validatePasswordStrength() {
       const password = this.formData.password;
       // Define password strength criteria using regular expressions
        const uppercaseRegex = /[A-Z]/;
        const lowercaseRegex = /[a-z]/;
        const digitRegex = /[0-9]/;
        const specialCharRegex = /[!@#$%^&*()_+[\]{};':"\\|,.<>/?]+/;

        // Check if the password meets the criteria
        const isStrongPassword =
          uppercaseRegex.test(password) &&
          lowercaseRegex.test(password) &&
          digitRegex.test(password) &&
          specialCharRegex.test(password) &&
          password.length >= 8;

          if (password.length === 0) {
            this.passwordStrengthMessage = '';
        } else if (isStrongPassword) {
            this.passwordStrengthMessage = '';
        } else {
            this.passwordStrengthMessage = 'Password Must include atleast 8 characters [Lowercase, Uppercase, numbers and symbols]';
        }
        return isStrongPassword;
        
      },

      ConfirmPassword(){
        var validate = true;
           // confirm password validation
           if(this.formData.ConfirmPassword ==''){
            this.error.ConfirmPassword ="please Confrim your password";
          validate = false;
        }
        else if(this.formData.password !== this.formData.ConfirmPassword ){
            this.error.ConfirmPassword ="Passwords do not match!";
          validate = false;
        }
        else{
            this.error.ConfirmPassword =''; // clear password
          return validate;
        }
        
      },

    
      validation(){
        var validate = true;
        this.error.name = validator(this.formData.name, 'required');
        this.error.email = validator(this.formData.email, 'email');
        this.error.password = validator(this.formData.password, 'required');
        this.error.PhoneNumber = validator(this.formData.PhoneNumber, 'required');
        this.error.address = validator(this.formData.address, 'required');
        this.error.ConfirmPassword = validator(this.formData.ConfirmPassword, 'required');
        this.error.role = validator(this.formData.role, 'required');

        // password validation, Password musbe atleast 8 chars
        if(this.formData.password.length < 8 && this.formData.password !== this.formData.ConfirmPassword ) 
        {
          this.error.password = 'Password must be atleast 8 charachters long.'; 
          validate =false;
        }
        else if(this.formData.password == ''){
          this.error.password = 'this password is required';
          validate =false;
        }
        else{
          this.error.password = ''; // clear password error
          validate =true;
        }
        
     

        if(this.error.name !== "" || 
          this.error.email !=="" || 
          this.error.password !=="" || 
          this.error.address !=="" || 
          this.error.ConfirmPassword !=="" || 
          this.error.PhoneNumber !=="" ||
          this.error.role !=="" 
         )

        {
          
          validate = false;
        }
        return validate;
      },

       submitForm() {
        
        console.log('cklicked')

        if(!this.validation()){
          return;
        }

        const isStrongPassword = this.validatePasswordStrength(this.formData.password);
        if(isStrongPassword)
        {
            // post user input to the database. through axios request
            axios.post('http://127.0.0.1:8000/api/register', {
              name: this.formData.name,
              email: this.formData.email,
              password: this.formData.password,
              address: this.formData.address,
              phone_number: this.formData.PhoneNumber,
              role:this.formData.role
            })
              .then(response => {
                // Handle success 
                if(response.status === true)
                {
                    console.log("user created!",this.formData.role)
                } 
                this.apiResponse = response.data.name;
                this.apiResponseEmail = response.data.email;
                this.apiResponseLastName = response.data.address;
                this.error.ConfirmPassword = ''; // Clear the ConfirmPassword error message
                //message came from api down here
                console.log(response.data.name); 
                this.resetForm()

                // Use useRouter to access the router instance
                // const router = useRouter();
                this.$router.push({ name: 'login' });
              
              })

               // Handle error
              .catch(error => {
                // console.log('STATUS')
                console.log(error)
                if(error.response.status && error.response.status === 422)
                {
                  console.log('there is an error in the backend code')
                  if(error.response.data.errors.email && error.response.data.errors.email !== null){
                    this.error.email = error.response.data.errors.email;
                  }
                  // if(error.response.data.errors.UserName && error.response.data.errors.UserName !== null){
                  //   this.error.UserName = error.response.data.errors.UserName;
                  // }
                }

              });

        }
        else{
          this.error.password ='password is not strong';
        }    
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your component-specific styles here */

  </style>
  