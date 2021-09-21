<template>
    <div>
        <div class="card m-3 shadow" v-for="post in posts" :key="post.id">
            <img class="img-fluid rounded-circle" :src="'/images/' + post.image" alt="" style="max-width: 10%;">
            <div class="card-body">
                <h4 class="card-title">{{post.title}}</h4>
                <b>Categoria ID: </b> <small>{{post.category_id}}</small>
                <p class="card-text">{{post.content}}</p>
                <button class="btn btn-primary" v-on:click="postClick(post)">Ver resumen</button>
                <router-link :to="{name: 'detail', params: {id: post.id}}" class="btn btn-success">Detail</router-link>
            </div>
        </div>

        <v-pagination class="mt-3" v-model="currentPage" :page-count="total" :classes="bootstrapPaginationClasses" :labels="paginationAnchorText"></v-pagination>

        <modal-post :post="postSelected"></modal-post>
    </div>
</template>

<script>
    import vPagination from 'vue-plain-pagination';

    export default {
        props: ['posts', 'total'],
        components: {
            vPagination
        },
        data() {
            return {
                postSelected: '',
                currentPage: 1,
                bootstrapPaginationClasses: {
                    ul: 'pagination',
                    li: 'page-item',
                    liActive: 'active',
                    liDisable: 'disabled',
                    button: 'page-link'
                },
                paginationAnchorText: {
                    first: '|<',
                    prev: '<<',
                    next: '>>',
                    last: '>|'
                }
            }
        },
        created() {},
        methods:{
            postClick(post) {
                this.postSelected = post
            },
        },
        watch:{
            currentPage(newVal, oldVal) {
                this.$emit('getCurrentPage', newVal);
            }
        }
    }
</script>
