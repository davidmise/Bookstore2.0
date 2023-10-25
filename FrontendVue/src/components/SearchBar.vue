<template>

    <div class="d-flex" role="search" >
        <input class="form-control me-2" v-model="searchQuery" @input="searchData" type="search" placeholder="Search Book" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </div>
    <div>
        <ul v-if="books.length">
            <li v-for="book in books" :key="book.id">
              {{ book.title }} by {{ book.name_of_the_Author }}
            </li>
          </ul>
          <div v-else>
            No books found.
          </div>
    </div>

</template>

<script>
import axios from 'axios'

export default{
    data() {
        return {
            searchedData:{},
            books:[],
            searchQuery : '',
            
        }
    },

    methods: {
        searchData(){
            console.log(this.searchQuery);
            
            axios.get('http://127.0.0.1:8000/api/searchbooks', { params: { search_term: this.searchQuery} })
            .then(response =>{
                this.books = response.data.books.data;
            })
        },
    },
}
</script>