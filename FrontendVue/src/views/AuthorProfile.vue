<template>
    <div>
        this is the Author's Profile {{ AuthorDetails.name_of_the_Author }}
        <AuthorDetails style="border-radius: 20px;"  type="submit" text="Edit Profile" classObject=" btn btn-outline-success mx-5" data-toggle="modal" data-target="#myModal"> </AuthorDetails>
        
        <LogoutButton style="border-radius: 20px;" class="btn btn-outline-success mx-5" @logged-out="handleLogout" /> 
    </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Author Details</h4>
                </div>
                <div class="modal-body">
                    <!-- Author Details form starts here -->
                    <form class="row g-3 was-validated" @submit.prevent="addAuthor">
                        
                        <!--Author Name -->
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" v-model="AuthorDetails.name_of_the_Author" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                       
                        <!-- Author Biography -->
                        <div class="mb-3 col-md-7">
                            <label for="validationTextarea" class="form-label">Biography</label>
                            <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" v-model="AuthorDetails.biography" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        
                        <!-- Book Price -->
                        <!-- <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Price</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">Tzsh</span>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" v-model="AuthorDetails.price" required>
                                <div class="invalid-feedback">
                                    Please enter the price of the book
                                </div>
                            </div>
                        </div> -->

                        <!--AUTHOR BIRTHDATE -->
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Author BirthDate</label>
                            <input type="date" format="YYYY-MM-DD" class="form-control" id="validationCustom03" v-model="AuthorDetails.author_birthdate" required>
                            <div class="invalid-feedback">
                                Please provide a valid Date.
                            </div>
                        </div>

                        <!-- Author's Nationality-->
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label"> Nationality </label>
                            <input type="link" class="form-control" id="validationCustom05" v-model="AuthorDetails.nationality" required>
                            <div class="invalid-feedback">
                                Please provide your Nationality
                            </div>
                        </div>

                        <!-- Terms and agreements -->
                        <div class="col-12">
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

                        <div class="col-12">
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
        AuthorDetails:{
            name_of_the_Author: '',
            biography: '',
            author_birthdate: '',
            nationality: '',
            user_id:localStorage.getItem('user_id')
        }
    }
  
},
created() {
  console.log('user id is:',localStorage.getItem('user_id'));  
},
methods: {
    addAuthor(){
            console.log('added!')
            // this.BooksDetails.Author_id = 
            axios.post('http://127.0.1:8000/api/authors',this.AuthorDetails)
            .then(response => {

                this.AuthorDetails = response.data;
               this.AuthorDetails.user_id= response.data.Author_id;
            //    console.log(this.AuthorDetails.user_id)

                // Store Author_id in the browser 
                localStorage.setItem('Author_id', response.data.Author_id);
                
                // convert author id into interger
                var Author_id = parseInt(localStorage.getItem('Author_id'));
                
                // check if data is populated
                console.log(this.AuthorDetails); 
                console.log('added successfully');

                var user_role = localStorage.getItem('user_role') //retrieve user role

                console.log('the Author_id is:', Author_id); 

                if(user_role == 'author') {
                    // this.AuthorDetails.user_id = Author_id
                    console.log('welcone')
                    // this.Author_id = this.user 
                    console.log(Author_id)
        
                }
            })
            .catch(error =>{
                console.error('Error fetching books:',error)
            });

    }
},
}
</script>