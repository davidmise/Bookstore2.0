<template>
        <section style="background-color: #eee;">
            <div class="container py-5">
              <div class="row">
                <div class="col">
                  <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                      <p class="breadcrumb-item h3 active" aria-current="page" style="color:teal"> Reader Profile</p>
                  </nav>
                </div>
              </div>
              
             <!-- row -->
              <div class="row">
                <div class="col-lg-4">
                 <!-- Reader's mini Profile -->
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                      <h5 class="my-3"> {{ this.Reader.name }}</h5>
                      <p class="text-muted mb-4">P.O BOX {{this.UserDetails.address}}, Kariakoo</p>
                      <div class="d-flex justify-content-center mb-2">
                        <!-- <button type="button" class="btn btn-primary">Follow</button> -->
                        <ReaderDetails style="border-radius: 20px;"  type="submit" text="Edit Proifile" id="fillReaderDetails" classObject=" btn btn-outline-success mx-2" data-toggle="modal" data-target="#myModal"> </ReaderDetails>
                        <!-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
                        <LogoutButton style="border-radius: 20px;" class="btn btn-outline-success ms-1" @logged-out="handleLogout" /> 
                      </div>
                    </div>
                  </div>
                  <!-- Social media -->
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
                <!-- Reder Details -->
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <!-- Reader Details card starts here-->
                    <div class="card-body">
                        <!-- Reader name -->
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0"> {{ this.Reader.name }} </p>
                        </div>
                      </div>
                      <hr>
                      <!-- Reader email -->
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
                          <p class="text-muted mb-0"> +255{{ this.Reader.phone_number }} </p>
                        </div>
                      </div>
                      <hr>   
                      <!-- Reader Adress -->
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
                  <!-- Reader's stas goes here -->
                  <div class="row">
                    <div class="col-md-12">
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
                    </div>
                    <div class="col-md-12">
                      <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                          <p class="mb-4  font-italic me-1" style="color: teal"> Biography </p>
                         <div> {{ }} </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Reader's Stats ends here -->
                </div>
              </div>
            </div>
          </section>
          <!-- Modal -->
          <section>    
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row align-items-start">
                                <div class="col-2">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="col-10">
                                    <h4 class="modal-title"> Edit User Details </h4>
                                </div>
                            </div> 
                        </div>
                        <!-- modal body -->
                        <div class="modal-body">
                            <!-- Reader Details form starts here -->
                            <form class="was-validated" @submit.prevent="editReader">                       
                            <!--Reader Name -->
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="validationCustom01" v-model="ReaderDetails.name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!--Reader Number -->
                                <div class="mb-3">
                                  <label for="validationCustom01" class="form-label">Phone Number</label>
                                  <input type="text" class="form-control" id="validationCustom01" v-model="ReaderDetails.phone_number" required>
                                  <div class="valid-feedback">
                                      Looks good!
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
          </section>
</template>

<script>
import axios from "axios";
import ReaderDetails from '@/components/Button.vue';
import LogoutButton from '@/components/LogoutButton.vue'; // Import the LogoutButton component

export default{
        components: {
        ReaderDetails,
        LogoutButton, // Register the LogoutButton component
        },

    data() {
        return {
            UserRole:null,
            UserDetails:{},
            Reader:{},
            ReaderDetails:{
                name: '',
                email: '',
                password: '',
                phone_number: '',
                address:'',
                cart_id: '',
                order_id: '',
                user_id: parseInt(localStorage.getItem('user_id'))
            }
        }
    },

    created() {
        // fetch user role from the browser
        // this.ReaderDetails.user_id = parseInt(localStorage.getItem('user_id'));
        this.UserRole = localStorage.getItem('user_role')
        this.getUserWithReader();
    },

    methods: {
        editReader(){
            var Reader_id = this.Reader.id;
                axios.put(`http://127.0.1:8000/api/readers/${Reader_id}`, this.ReaderDetails)
                .then(response => {
                    
                  this.ReaderDetails = response.data;        
                  this.ShowModal=false;
                  // Store Author_id in the browser 
                  localStorage.setItem('Reader_id', response.data.Reader_id); 
                // check if data is populated
                  console.log(this.ReaderDetails); 
                  console.log('added successfully');
                  // store Reader id
                  var user_role = localStorage.getItem('user_role') //retrieve user role
                  console.log('the Redear_id is:', Reader_id); 
        
                  if(user_role == 'reader') {
                      console.log('welcone')
                      console.log(Reader_id)
                  }
                })
                .catch(error =>{
                    console.error('Error fetching Reader:',error)
                });
        },

        getUserWithReader(){
            var User_id = parseInt(localStorage.getItem('user_id'))
            axios.get(`http://127.0.0.1:8000/api/users/${User_id}`)
            .then(response => {
            this.UserDetails = response.data;
            this.Reader = response.data.reader;
            this.Reader.id = response.data.reader.id;          
            console.log("reader id is:", this.Reader.id)
            console.log('Reader Details:', this.Reader)
            console.log('User Details:',this.UserDetails);   
        })

        .catch(error => {
            console.error('Error fetching Users:', error)
            });
        }, 
    },
}
</script>