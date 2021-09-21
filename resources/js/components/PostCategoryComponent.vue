<template>
    <div>
        <h1>{{category.name}}</h1>

        <list-post v-if="total > 0" :posts="posts" :total="total" @getCurrentPage="getCurrentPage"></list-post>

        <!-- <div class="card m-3 shadow" v-for="post in posts" :key="post.id">
            <img class="img-fluid rounded-circle" :src="'/images/' + post.image" alt="" style="max-width: 10%;">
            <div class="card-body">
                <h1>{{titulo}}</h1>
                <h4 class="card-title">{{post.title}} </h4>
                <p class="card-text">{{post.content}}</p>
                <router-link :to="{name: 'detail', params: {id: post.id}}" class="btn btn-success">Detail</router-link>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                category: {},
                total: 0,
                currentPage: 1
            }
        },
        created() {
            this.getPosts();
        },
        methods:{
            getPosts(){
                fetch('/api/post/'+this.$route.params.category_id+'/category?page='+this.currentPage).then(res => res.json()).then((json) => {
                    this.category = json.data.category;
                    this.posts = json.data.post.data;
                    this.total = json.data.post.last_page
                });
            },
            getCurrentPage(val) {
                this.currentPage = val;
                this.getPosts();
            }
        }
    }
</script>
