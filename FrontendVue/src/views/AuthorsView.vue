<template>
    <div>
        
              UPload your new book here your new book here: {{ this.BooksDetails.genreId}}
         <addBook style="border-radius: 20px;"  type="submit" text="Add Book+" classObject=" btn btn-outline-success mx-5" data-toggle="modal" data-target="#myModal"> </addBook>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header container">
                    <div class="row align-items-start">
                        <div class="col-2">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                
                        <div class="col-10">
                            <h4 class="modal-title">Book Details</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- Books detatils form starts here -->
                    <form class=" was-validated" @submit.prevent="addBook">
                        
                        <!-- Book Title -->
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="validationCustom01" v-model="BooksDetails.title" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                       
                        <!-- Book Description -->
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Description:</label>
                            <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" v-model="BooksDetails.description" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        
                        <!-- Book Price -->
                        <div class="mb-3">
                            <label for="validationCustomUsername" class="form-label">Price:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend" >Tzs</span>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" v-model="BooksDetails.price" required>
                                <div class="invalid-feedback">
                                    Please enter the price of the book
                                </div>
                            </div>
                        </div>

                        <!-- Publioshed date of the Book -->
                        <div class="mb-3">
                            <label for="validationCustom03" class="form-label">Published Date</label>
                            <input type="date" format="YYYY-MM-DD" class="form-control" id="validationCustom03" v-model="BooksDetails.published_date" required>
                            <div class="invalid-feedback">
                                Please provide a valid Date.
                            </div>
                        </div>

                        <!-- Cover image of the book -->
                        <div class="mb-3">
                            <label for="validationCustom05" class="form-label">Cover image (link) </label>
                            <input type="link" class="form-control" id="validationCustom05" v-model="BooksDetails.cover_image" required>
                            <div class="invalid-feedback">
                                Please provide a valid link
                            </div>
                        </div>

                        <!-- select genre -->
                            <select class="form-select" aria-label="Default select example" id="validationCustom05" v-model="BooksDetails.genre_id">
                                <option value="" disabled class="form-label mb-3" >Select a Genre</option>
                                <template v-for="genre in genres" :key="genre.id">
                                    <option :value="genre.id" class="form-label ">{{ genre.category }}</option>
                                </template>
                            </select>
                            

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

                        <div class="col-12">
                            <button class="btn btn-outline-success" type="submit">Submit form</button>
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
import axios from "axios"
import addBook from '@/components/Button.vue'
export default{
    components:{
        addBook
    },

    data(){
        return{
            UserDetails:{},
            Author:{},
            Books:[],
            genres:[],
            BooksDetails:{
                title:'',
                description:'',
                price:'',
                published_date:'',
                cover_image:'',
                genre_id:'',
                Author_id:'',
            },
            error:{
                title:'',
                description:'',
                price:'',
                published_date:'',
                cover_image:'',
                genre_id:'',
                Author_id:'',
            },
            Genre:{
                category:''
            },
            genreId:''
        }

    },
    created() {
        this.getUserWithAuthor()
        this.fetchGenres()

    },
    // created() {
    //         // // this.checkUser()
    //         // var user_role = localStorage.getItem('user_role') //retrieve user id
    //         // var user = localStorage.getItem('user_id')
    //         // if(user_role == 'author') {
    //         //     this.Author_id = user 
    //         //     console.log(this.Author_id)
    //         //     console.log(user_role)
    //         // }
    //     },
   
    methods: {
        addBook(){
            console.log('added!')
            // this.addGenre();
            this.BooksDetails.Author_id = this.Author.id;
          


            console.log(this.BooksDetails);
            console.log(this.BooksDetails.Author_id);
           
            axios.post('http://127.0.1:8000/api/books',this.BooksDetails)
            .then(response => {
                this.BooksDetails = response.data;
                this.BooksDetails.Author_id = localStorage.getItem('Author_id');
                console.log(this.BooksDetails); // check if data is populated
                console.log('added successfully')

                var user_role = localStorage.getItem('user_role') //retrieve user id
                //  var author_id = this.BooksDetails.Author_id

                if(user_role == 'author') {
                    // console.log(this.BAuthor_id)
                    console.log('this is an ',user_role)

                   
                }
            })
            .catch(error =>{
                console.error('Error fetching books:',error)
            });
        },

        getUserWithAuthor(){

            var User_id = parseInt(localStorage.getItem('user_id'))
            axios.get(`http://127.0.0.1:8000/api/users/${User_id}`)
            .then(response => {
            this.UserDetails = response.data;

            this.Author = response.data.author;
            this. Author.id = response.data.author.id;
            // console.log(this.Author.id);



            
            console.log('Author Details:', this.Author)
            
            console.log('User Details:',this.UserDetails);
            
            //  console.log( 'auhtors are: ',User); // Check if the data is populated
            //  console.log(this.user_id)
        })

        .catch(error => {
            console.error('Error fetching Users:', error)
            });
    },

        fetchGenres(){

            axios.get('http://127.0.0.1:8000/api/fetchGenres')
            .then(response => {
                console.log(response.data);
                this.genres = response.data
            })

            .catch(error => {
                console.error('ERROR fetching genres:',error)
            });
        },

    //  addGenre(){
    //     console.log('genre submited')
        
    //     axios.post('http://127.0.0.1:8000/api/genres',this.Genre)
    //     .then(response =>{
    //         console.log(response.data);
    //         this.genreId = response.data.genre_id;
    //         console.log(this.genreId)
    //     })
        
    //     .catch(error =>{
    //         console.error('Error fetching genres:',error)
    //     });
    // }

        // checkUser(){
        //     var user_role = localStorage.getItem('user_role') //retrieve user id
        //     var user = localStorage.getItem('user_id')
        //     if(user_role == 'author') {
        //         this.Author_id = user 
        //         console.log(this.Author_id)
        //     }
        // }
    },

}
</script>