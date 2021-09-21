<template>
    <div>
        <h1>Contenido inicial</h1>

        <div class="clearfix">
            <div class="float-right">
                <router-link :to="{name: 'contact'}" class="btn btn-primary">Contacto</router-link>
            </div>
        </div>

        <list-post v-if="total > 0" :posts="posts" :total="total" @getCurrentPage="getCurrentPage"></list-post>
    </div>
</template>

<script>
    export default {
        props: ['titulo'],
        data() {
            return {
                postSelected: '',
                posts: [],
                total: 0,
                currentPage: 1
            }
        },
        created() {
            this.getPosts();
        },
        methods:{
            postClick(post) {
                this.postSelected = post
            },
            getPosts(){
                fetch('/api/post?page='+this.currentPage).then(res => res.json()).then((json) => {
                    this.posts = json.data.data
                    this.total = json.data.last_page
                });
            },
            getCurrentPage(val) {
                this.currentPage = val;
                this.getPosts();
            }
        }
    }
</script>
