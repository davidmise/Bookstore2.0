<template>

    <form class="d-flex" role="search" @submit.prevent="searchData">
        <input class="form-control me-2"  type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

</template>

<script>
import axios from 'axios'

export default{
    data() {
        return {
            searchedData:{},
            
        }
    },

    methods: {
        searchData(){
            axios.get('http://127.0.0.1:8000/api/searchbooks')
            .then(response =>{
                this.searchedData=response.data
            })
        }
    },
}
</script>