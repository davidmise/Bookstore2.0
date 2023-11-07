<template >
   <section>
    <div class="container">
      <div class="row">
        <div class="col-11 d-flex justify-content-center align-items-center">
          <div class="d-flex " role="search" >
              <input class="form-control me-2" v-model="searchQuery" @input="searchData" type="search" placeholder="Search Book" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </div>
        </div>
      </div>
  </div>

  <!-- <searchBar></searchBar> -->
  <div v-for="(book, index) in Books" :key="index">
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
                              <button style=" margin-left:50px;" type="button" class="btn btn-outline-success">Add to Cart </button>
                              <!-- <img style=" margin-left:10px;" width="36" height="36" src="https://img.icons8.com/sf-regular-filled/96/12B886/shopping-cart.png" alt="shopping-cart"/> -->
                           </div>   
                      </div>
                  </div>
              </div>
              <!-- Book card ends here -->
          </div>
        </div>
      </div>
    </div>

  <!-- not found message -->
  <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center mt-4">
          <div v-show="searchQuery !== '' && books.length == 0" class="not-found-message text-center">
            <span class="icon">
              <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            </span>
            <span class="message">
              The search key does not match any book
            </span>
          </div>
        </div>
      </div>
    </div>  


    <!-- Pagination controls -->
    <div class="container mt-4">
      <ul class="pagination justify-content-center" >
          <li class="page-item" :class="{ disabled: currentPage === 1 }">
              <button class="page-link btn btn-outline-success" @click="prevPage" :disabled="currentPage === 1" style="color:teal">Previous</button>
          </li>
          <li class="page-item" v-for="page in data.last_page" :key="page" :class="{ active: currentPage === page }">
              <button class=" btn btn-outline-success border-0" @click="getBooks(page)">{{ page }}</button>
          </li>
          <li class="page-item" :class="{ disabled: currentPage === data.last_page }">
              <button class="page-link btn btn-outline-success" @click="nextPage" :disabled="currentPage === data.last_page"  style="color:teal">Next</button>
          </li>
      </ul>
  </div>
   </section>
</template>
<script>

import axios from "axios"
// import addBook from '@/components/Button.vue'
// import searchBar from '../components/SearchBar.vue'
export default{
   
   components:{
    // addBook
    // searchBar 
   },
    data(){
        return{
            searchedData:{},
            books:[],
            searchQuery : '',
            
            data: {},
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
            },
            currentPage: 1,
            itemsPerPage: 5, // Adjust the number of items per page as needed
        }
    },

    computed: {
    totalPageCount() {
      return Math.ceil(this.Books.length / this.itemsPerPage);
    },

    paginatedBooks() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.Books.slice(startIndex, endIndex);
    },
    },

    created() {
      localStorage.getItem('user_id')
    },
    // protect books
   
    methods: {
        searchData(){
            console.log(this.searchQuery);
            
            axios.get('http://127.0.0.1:8000/api/searchbooks', { params: { search_term: this.searchQuery} })
            .then(response =>{
                this.data = response.data;
                this.Books = response.data.books.data;
            })

            .catch(error=>{
            console.log("error searching books", error)
            });
        },

        getBooks(index){
            // this.beforeRouteEnter();
         // communicate wiith api to pull list of books from  the database
         this.currentPage = index
        axios.get('http://127.0.0.1:8000/api/books?page='+this.currentPage)
        .then(response => {
         this.data = response.data;
         this.Books = this.data.data;
         console.log(this.Books); // Check if the data is populated
        //  console.log(this.user_id)
      })

      .catch(error => {
        console.error('Error fetching data:', error)
         });

        },

        prevPage(){
            if(this.currentPage > 1){
                this.currentPage--;
                this.getBooks(this.currentPage);
            }
        },

        nextPage(){
            if(this.currentPage < this.data.last_page){
                this.currentPage++;
                this.getBooks(this.currentPage);
            } 
        },
        changePage(pageNumber){
            this.currentPage = pageNumber
        }
 
    },
    
    mounted() {
        // Fetch data from the Laravel API using Axios or a similar library
        this.getBooks(1);
    },
       
    
};
</script> 

<!-- <style>
@media (min-width: 1024px) {
    header {
      display: flex;
      place-items: center;
      padding-right: calc(var(--section-gap) / 2);
    }
  
    .logo {
      margin: 0 2rem 0 0;
    }
  
    header .wrapper {
      display: flex;
      place-items: flex-start;
      flex-wrap: wrap;
    }
  
  }</style> -->