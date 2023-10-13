<template>
    <section>
        <div class="container mt-5 pt-5">
          <div class="row">
            <div class="col-12 col-sm-7 col-md-6 m-auto">
              <!-- form card stars here -->
              <div class="card border-0 text-center shadow" style="color: teal;">
                <div class="card-body">
                  <svg class="mx-auto my-3 col-12 " xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"  viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg>
                  <h3 class=""> Sing in</h3>
                  <!-- form starts here -->
                  <form action="" @submit.prevent="submit">
                    <!-- email -->
                    <input type="text" name="uname" id="myForm" class="form-control my-4 py-2" placeholder="Email" v-model="LoginData.email"/>
                    <div class="alert alert-danger" v-show="error.email !== ''">{{error.email}}</div>
                    <!-- pasword input -->
                    <div class="form-outline">
                      <input  :type="showPassword ? 'text' : 'password'" name="pass" id="password" class="form-control my-4 py-2" placeholder="Password"  v-model="LoginData.password"/>
                      <div class="alert alert-danger" v-show="error.password !== ''">{{error.password}}</div>
                      <!-- eye-icon -->
                      <span class="eye-icon" @click="showPassword = !showPassword">
                        <i class="fa fa-eye" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                      </span>
                    </div>
                  
                   <!-- button -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-lg-5" style="background-color: teal; border:none;" name="submit">Login</button>
                    </div>  
                     <router-link to="/register">
                        <span style="color: teal;"> Do not have an Acount?</span>
                     </router-link>
                  </form>                    
                </div>
              </div>
              <!-- form card ends here -->
            </div>
          </div>
        </div>
      </section>
      
</template>

<script>
import axios from "axios"
import validator from "../../src/helpers/validator.js"
  export default{
    data() {
      return {
        showPassword: false,
        apiResponse:'',

        LoginData: {
          email: '',
          password: '',
        },

        error: {
          email: '',
          password: ''
        },
      
      }
    },

    methods: {
      resetForm(){
        this.LoginData.email ='';
        this.LoginData.password ='';
        this.apiResponse = ''
      },

      validation(){
        
        var validate = true;
        this.error.email = validator(this.LoginData.email, 'email')
        this.error.password = validator(this.LoginData.password, 'required')

        // password length validation check
        if(this.LoginData.password.length < 8)
        {
          this.error.password = 'Password must be atleast 8 charachters long.'
          validate = false
        }
        else{
          this.error.password = '' //clear password eror
        }

        if(this.error.email !=="" || this.error.password !==""){
          validate = false
        }
        return validate
      },

      submit(){
        console.log('submited')
        if(!this.validation()){
          return;
        }

      console.log('success');
        // check communicate with api to log in data
        axios.post('http://127.0.0.1:8000/api/login', this.LoginData)
        .then(response =>{
          // Handle success
            console.log(response.data.user) 

            // Extract the user_id from the response
            const user_id = response.data.user.id; 
            localStorage.setItem('user_id', user_id); // Store it in local storage
            console.log('user id is',localStorage.getItem('user_id'));

            // Extract the user_role from the response
            const user_role = response.data.user.role;
            localStorage.setItem('user_role', user_role); // Store it in local storage
            console.log(localStorage.getItem('user_role'));

            
            // Redirect the user to the dashboard or another protected route\
            if (response.data.user.role === 'author') {
                // console.log()
                // tulikuwa tunavuta response.data.author.id
                localStorage.setItem('author_id', response.data.user.author.id)
                console.log('auhor id is:',localStorage.getItem('author_id'))
             
                  // Redirect to author profile page
                  this.$router.push({ name: 'author.profile' });
        
                  // Now, make a request to fetch data from the author's table
                 
            } else {
              // Redirect to reader profile page
              this.$router.push({ name: 'reader.profile' });
             }
      
              // Redirect to author profile page
              // this.$router.push({ name: '' });
              this.apiResponse= response.data.email
              this.resetForm()

          //store user_id to local storage

        })

        .catch(error =>{
          // handel error
          console.log(error)
          console.log('incorrect Email or password')
          if(error.response.status && error.response.status === 401){
            this.error.password = error.response.data.message
            console.log(this.error.password)
          }
         
          // this.resetForm()
        
        }) 
        

    },
  }
};
</script>