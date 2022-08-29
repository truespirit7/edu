// resources/assets/js/components/searchForm.vue

<template>
    <div class="search-form" style="position: relative!important;">
        <form action="" method="get">

            <input  v-model="query" v-on:keyup="getResults()"
                    type="search"  name="search"  class='form-control'  placeholder="Введите для поиска">
            <button type="submit"><i class="fa fa-search"></i></button>

        </form>

        <ul class="list-group"  style="position: absolute!important;"   v-if="results.length"  >

            <li class="list-group-item" style="position: relative" v-for="result in results">
                <a v-bind:href="'/article/'+ result.id">{{ result.title }}</a>
            </li>

        </ul>
    </div>

</template>

<script>
export default {
    name: "searchForm",
    data(){
        return {
            query: '',
            results: []
        }
    },
    methods: {
        getResults(){
            axios.post('/search', {query: this.query})
                .then((response) => {
                    console.log(response.data);
                    this.results = response.data;
                })
        }
    }
}
</script>

<style scoped>

</style>
