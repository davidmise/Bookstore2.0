<template>
    <div>
        <!-- this is the Author's Profile {{ AuthorDetails.name_of_the_Author }} -->
       
        <section style="background-color: #eee;">
            <div class="container py-5">
              <div class="row">
                <div class="col">
                  <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                      <p class="breadcrumb-item h3 active" aria-current="page" style="color:teal">Author Profile</p>
                  </nav>
                </div>
              </div>
          
              <div class="row">
                <div class="col-lg-4">
                    <!-- Author's mini Profile -->
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                      <h5 class="my-3"> {{ this.Author.name_of_the_Author }}</h5>
                      <p class="text-muted mb-1">Ratings:</p>
                      <p class="text-muted mb-4">P.O BOX {{this.UserDetails.address}}, Kariakoo</p>
                      <div class="d-flex justify-content-center mb-2">
                        <!-- <button type="button" class="btn btn-primary">Follow</button> -->
                        <AuthorDetails style="border-radius: 20px;"  type="submit" text="Edit Proifile" id="fillAuthorDetails" classObject=" btn btn-outline-success mx-2" data-toggle="modal" data-target="#myModal"> </AuthorDetails>
                        <!-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
                        <LogoutButton style="border-radius: 20px;" class="btn btn-outline-success ms-1" @logged-out="handleLogout" /> 
                      </div>
                    </div>
                  </div>

                  <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                      <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fas fa-globe fa-lg text-warning"></i>
                          <p class="mb-0">https://mdbootstrap.com</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                          <p class="mb-0">mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                          <p class="mb-0">@mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                          <p class="mb-0">mdbootstrap</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                          <p class="mb-0">mdbootstrap</p>
                        </li>
                      </ul>
                    </div>
                  </div>

                </div>

                <div class="col-lg-8">
                  <div class="card mb-4">
                    <!-- Author Details card starts here-->
                    <div class="card-body">
                        <!-- Author name -->
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0"> {{ this.Author.name_of_the_Author}} </p>
                        </div>
                      </div>
                      <hr>
                      <!-- Athor email -->
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{this.UserDetails.email}}</p>
                        </div>
                      </div>
                      <hr>
                      <!-- Author phone number -->
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0"> +255{{ this.UserDetails.phone_number }} </p>
                        </div>
                      </div>
                      <hr>
                      <!-- Author Birthdate -->
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">BirthDate</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0"> {{ this.Author.author_birthdate }} </p>
                        </div>
                      </div>
                      <hr>
                      <!-- Authir Adress -->
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0"> P.O BOX {{this.UserDetails.address}}, Kariakoo, Dar Es Salaam, TZ</p>
                        </div>
                      </div>
                      <!-- card body ends here -->
                    </div>
                  </div>
                  <!-- Author's Biography goes here -->
                  <div class="row">
                    <!-- <div class="col-md-12">
                      <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                          <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                          </p>
                          <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                          <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                          <p class=" mb-4  font-italic me-1" style="color: teal" >Biography</p>
                         <div> {{ this.Author.biography}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Author's Bio ends here -->
                </div>
              </div>
            </div>
          </section>
    </div>

     <!-- Modal -->
     <div   class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row align-items-start">
                        <div class="col-2">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                
                        <div class="col-10">
                            <h4 class="modal-title">Author Details</h4>
                        </div>
                    </div>
                   
                    
                </div>
                <div class="modal-body">
                    <!-- Author Details form starts here -->
                    <form class="was-validated" @submit.prevent="editAuthor">
                                               
                        <!--Author Name -->
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="validationCustom01" v-model="AuthorDetails.name_of_the_Author" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                       
                        <!-- Author Biography -->
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Biography:</label>
                            <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" v-model="AuthorDetails.biography" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    
                        <!--AUTHOR BIRTHDATE -->
                        <div class="mb-3">
                            <label for="validationCustom03" class="form-label">BirthDate:</label>
                            <input type="date" format="YYYY-MM-DD" class="form-control" id="validationCustom03" v-model="AuthorDetails.author_birthdate" required>
                            <div class="invalid-feedback">
                                Please provide a valid Date.
                            </div>
                        </div>

                        <!-- Author's Nationality-->
                        <div class="mb-3">
                            <label for="validationCustom05" class="form-label"> Nationality: </label>
                            <input type="link" class="form-control" id="validationCustom05" v-model="AuthorDetails.nationality" required>
                            <div class="invalid-feedback">
                                Please provide your Nationality
                            </div>
                        </div>

                        <!-- Terms and agreements -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-outline-success" type="submit">Update Profile </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Save changes</button>
                </div>
            </div>
        </div>
     </div>

   

</template>
<script>
// import $ from "/jquery";
import axios from "axios";
import AuthorDetails from '@/components/Button.vue';
import LogoutButton from '@/components/LogoutButton.vue'; // Import the LogoutButton component
export default{
    components: {
     AuthorDetails,
    LogoutButton, // Register the LogoutButton component
    },
data() {
    return {
        UserRole:null,
        UserDetails:{},
        Author:{},
        AuthorDetails:{
            name_of_the_Author: '',
            biography: '',
            author_birthdate: '',
            nationality: '',
            user_id:  parseInt(localStorage.getItem('user_id'))
        }
    }
  
},
created() {
    // fetch user role from the browser
    this.UserRole = localStorage.getItem('user_role')

    // if(this.UserRole == 'author')
    // {
    //     this.ShowModal=true
    // }
    // Fetch User details
    this.getUserWithAuthor();

},


methods: {
    editAuthor(){
        var Author_id = this.Author.id
            axios.put(`http://127.0.1:8000/api/authors/${Author_id}`, this.AuthorDetails)
            .then(response => {

                this.AuthorDetails = response.data;
                this.ShowModal=false;

                // Store Author_id in the browser 
                localStorage.setItem('Author_id', response.data.Author_id);
                
                // convert author id into interger

                // check if data is populated
                console.log(this.AuthorDetails); 
                console.log('added successfully');

                var user_role = localStorage.getItem('user_role') //retrieve user role

                console.log('the Author_id is:', Author_id); 
    
                if(user_role == 'author') {
                    console.log('welcone')
                    console.log(Author_id)
        
                }
            })
            .catch(error =>{
                console.error('Error fetching Author:',error)
            });
    },

   
    getUserWithAuthor(){
        var User_id = parseInt(localStorage.getItem('user_id'))
        axios.get(`http://127.0.0.1:8000/api/users/${User_id}`)
        .then(response => {
         this.UserDetails = response.data;

         this.Author= response.data.author;
        //  this. Author.id = response.data.author.id;
         
         console.log('Author Details:', this.Author)
          
         console.log('User Details:',this.UserDetails);
        
         //  console.log( 'auhtors are: ',User); // Check if the data is populated
        //  console.log(this.user_id)
      })

      .catch(error => {
        console.error('Error fetching Users:', error)
         });

    },
    
},

}
</script>