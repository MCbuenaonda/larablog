<template>
    <div>
        <div class="row">
            <div class="col-md-3" v-for="category in categories" :key="category.id">
                <div class="card m-3 shadow">
                    <router-link :to="{name: 'post-category', params: {category_id: category.id}}">
                        <img class="img-fluid" :src="'/images/php.svg'" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{category.name}}</h4>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: ''
            }
        },
        created() {
            this.getCategories();
        },
        methods:{
            getCategories() {
                fetch('/api/category/all').then(res => res.json()).then((json) => {
                    this.categories = json.data
                });
            },
        }
    }
</script>
