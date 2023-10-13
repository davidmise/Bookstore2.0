<template >
    <!-- <button style="border-radius: 20px;" type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">Add Books + </button>    -->
    <!-- <addBook style="border-radius: 20px;"  type="submit" text="Add Book+" classObject=" btn btn-outline-success mx-5" data-toggle="modal" data-target="#myModal"> </addBook> -->
    <template v-for="(book, index) in Books" :key="index">
        <div class="container mt-5 pt-5">
          <div class="row">
            <div class="col-12  m-auto">
                <!-- Book card starts here -->
                <div class="card border-0 shadow mb-3 mx-5" style="max-width: 940px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Ym9va3xlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" class="img-fluid rounded-start" alt="...">
                        </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"> Book title: {{book.title}}</h5>
                                    <h6>Genre:{{book.genre.category}}</h6>
                                    <p class="card-text"> {{book.description}}This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. </p>
                                    <p></p>
                                    <p class="card-text"><small class="text-muted"> <b>Published at:</b> {{ book.published_date}} </small></p>
                                    <p class="card-text"><small class="text-muted"> <b>By:</b> {{ book.author.name_of_the_Author}} </small></p>
                                    <p>Price: {{book.price}} </p>
                                    <button type="button" class="btn btn-outline-success">Buy </button>
                                    <img style=" margin-left:10px;" width="36" height="36" src="https://img.icons8.com/sf-regular-filled/96/12B886/shopping-cart.png" alt="shopping-cart"/>
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
                                    
                                </div>
                            
                            </div>
                    </div>
                </div>
                <!-- Book card ends here -->
            </div>
          </div>
        </div>
    </template>
</template>
<script>

import axios from "axios"
// import addBook from '@/components/Button.vue'
export default{
   
   components:{
    // addBook
   },
    data(){
        return{
            Books:[],
            BooksDetails:{
                title:'',
                description:'',
                price:'',
                published_date:'',
                cover_image:''
            },
            error:{
                title:'',
                description:'',
                price:'',
                published_date:'',
                cover_image:''
            }
        }

    },
    created() {
      localStorage.getItem('user_id')
    },
    // protect books
   
    methods: {
        // get books
        getBooks(){
            // this.beforeRouteEnter();
         // communicate wiith api to pull list of books from  the database
        axios.get('http://127.0.0.1:8000/api/books')
        .then(response => {
         this.Books = response.data;
         console.log(this.Books); // Check if the data is populated
        //  console.log(this.user_id)
      })

      .catch(error => {
        console.error('Error fetching data:', error)
         });

        },
 
    },
    
    mounted() {
        // Fetch data from the Laravel API using Axios or a similar library
        this.getBooks();
    },
       
    
};
</script> 