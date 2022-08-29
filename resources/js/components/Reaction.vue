// resources/assets/js/components/Reaction.vue
<template>
    <a href=""><i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></a>
    {{ likes_count }}
</template>
<script>
export default {
    props:[
        'post_id',
        // 'likes_count'
    ],
    data(){
        return {
            likes_count: null
        }
    },
    mounted(){
      this.getLikes();
    },
    methods:
        {
            getLikes() {
                axios.post('/article/3/like')
                    .then(data=> {
                        this.likes_count = data.data;
                    })
            }
        }
}
</script>

<style scoped>

</style>
