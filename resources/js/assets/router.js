window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import ListPost from '../components/PostCardComponent.vue'
import DetailPost from '../components/PostDetailComponent.vue'
import CategoryPost from '../components/PostCategoryComponent.vue'
import CategoryList from '../components/CategoryListComponent.vue'
import Contact from '../components/ContactComponent.vue'

// const Foo = {template: '<div>Foo <router-link to="/bar">| Bar</router-link> <router-link to="/">| List</router-link> </div>'}
// const Bar = {template: '<div>Bar <router-link to="/foo">| Foo</router-link> <router-link to="/">| List</router-link> </div>'}

const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: ListPost, name: 'list'},
        {path: '/categories', component: CategoryList, name: 'list-category'},
        {path: '/detail/:id', component: DetailPost, name: 'detail'},
        {path: '/post-category/:category_id', component: CategoryPost, name: 'post-category'},
        {path: '/contact', component: Contact, name: 'contact'}
        // {path: '/foo', component: Foo},
        // {path: '/bar', component: Bar}
    ]
});

Vue.use(VueRouter);

export default router;
