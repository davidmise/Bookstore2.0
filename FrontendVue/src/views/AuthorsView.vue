<template>
    <div>
        
                UPload your new book here your new book here: {{ this.BooksDetails.genreId}}
         <addBook style="border-radius: 20px;"  type="submit" text="Add Book+" classObject=" btn btn-outline-success mx-5" data-toggle="modal" data-target="#myModal"> </addBook>
    </div>
    <!-- <div> -->
        <!-- <form action="" class="row g-3 was-validated" @submit.prevent="addGenre">

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label"> Genre </label>
                <input type="text" class="form-control" id="validationCustom02" v-model="Genre.category" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-outline-success" type="submit">Submit form</button>
            </div>
        </form>
    </div> -->
     <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Book Details</h4>
                </div>
                <div class="modal-body">
                    <!-- Books detatils form starts here -->
                    <form class="row g-3 was-validated" @submit.prevent="addBook">
                        
                        <!-- Book Title -->
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Title</label>
                            <input type="text" class="form-control" id="validationCustom01" v-model="BooksDetails.title" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                       
                        <!-- Book Description -->
                        <div class="mb-3 col-md-7">
                            <label for="validationTextarea" class="form-label">Description</label>
                            <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" v-model="BooksDetails.description" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        
                        <!-- Book Price -->
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Price</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">Tzsh</span>
                                <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" v-model="BooksDetails.price" required>
                                <div class="invalid-feedback">
                                    Please enter the price of the book
                                </div>
                            </div>
                        </div>

                        <!-- Publioshed date of the Book -->
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Published Date</label>
                            <input type="date" format="YYYY-MM-DD" class="form-control" id="validationCustom03" v-model="BooksDetails.published_date" required>
                            <div class="invalid-feedback">
                                Please provide a valid Date.
                            </div>
                        </div>

                        <!-- Cover image of the book -->
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Cover image (link) </label>
                            <input type="link" class="form-control" id="validationCustom05" v-model="BooksDetails.cover_image" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>

                        <!-- select genre -->
                        <select class="form-select" aria-label="Default select example" v-model="BooksDetails.genre_id">
                            <option value="" disabled>Select a Genre</option>
                            <template v-for="genre in genres" :key="genre.id">
                                <option :value="genre.id">{{ genre.category }}</option>
                            </template>
                        </select>

                    <!-- <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> Genre </label>
                        <input type="text" class="form-control" id="validationCustom02" v-model="Genre.category" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div> -->
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
            // console.log('added!')
            // this.addGenre();
            this.BooksDetails.Author_id = localStorage.getItem('author_id')
            console.log(localStorage.getItem('author_id'))
            console.log(this.BooksDetails);
            // this.BooksDetails.Author_id = 
            axios.post('http://127.0.1:8000/api/books',this.BooksDetails)
            .then(response => {
                this.BooksDetails = response.data;
                console.log(this.BooksDetails); // check if data is populated
                console.log('added successfully')

                // var user_role = localStorage.getItem('user_role') //retrieve user id
                //  this.user = localStorage.getItem('author_id')

                // if(user_role == 'author') {
                //     this.Author_id = this.user 
                //     console.log(this.Author_id)
                //     console.log(user_role)

                   
                // }
            })
            .catch(error =>{
                console.error('Error fetching books:',error)
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