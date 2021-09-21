<template>
    <div>
        <div v-if="post">
            <div class="card m-3 shadow">
                <img class="img-fluid rounded-circle" :src="'/images/' + post.image.image" alt="" style="max-width: 10%;">
                <div class="card-body">
                    <h1>{{titulo}}</h1>
                    <h4 class="card-title">{{post.title}}</h4>
                    <p class="card-text">{{post.content}}</p>
                    <router-link :to="{name: 'post-category', params: {category_id: post.category.id}}" class="btn btn-success">{{post.category.name}}</router-link>
                </div>
            </div>
        </div>

        <div v-else>
            <h1>Post no existe</h1>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo'],
        data() {
            return {
                postSelected: '',
                post: {}

            }
        },
        created() {
            this.getPost();
        },
        methods:{
            getPost() {
                fetch('/api/post/'+this.$route.params.id).then(res => res.json()).then((json) => {
                    this.post = json.data
                    // this.post.image = json.data.image.image;
                    // this.post.category = json.data.category;
                    // this.post.category = this.post.category.name;
                });
            }
        }
    }
</script>
