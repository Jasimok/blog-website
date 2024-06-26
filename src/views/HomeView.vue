<template>
    <HeroComponent />
    <div class="contentsection contemplete clear">
        <div class="maincontent clear">
            <div class="samepost clear" v-for="(item, index) in posts" :key="index">
                <h2><a href="#">{{ item.title }}</a></h2>
                <h4>{{ item.date }}, By <a href="#">{{ item.author }}</a></h4>
                <a href="#"><img :src="item.img" alt="post image" /></a>
                <p>{{ item.desccription }}</p>
                <div class="readmore clear">
                    <a href="post.html">Read More</a>
                </div>
            </div>
            <div class="freagmention">
                <ul>
                    <li v-for="page in totalpage" :key="page">
                        <a href="#" @click.prevent="fetchPosts(page)">{{ page }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <Sidebar />
    </div>
</template>

<script>
import HeroComponent from "../components/HeroComponent.vue";
import Sidebar from "../components/Sidebar.vue";
import axios from 'axios';

export default {
    name: 'HomeView',
    components: {
        HeroComponent,
        Sidebar
    },
    data() {
        return {
            posts: [],
            totalpage:1,
            limit:3,
            currrentpage:1
        }
    },
    mounted() {
        this.fetchPosts(this.currrentpage);
    },
    methods: {
        fetchPosts(page) {
            axios.get(`http://localhost/blog-website/src/Api/Api.php?action=select&page=${page}&limit=${this.limit}`)
            .then(response => {
                this.posts = response.data.user_data;
                this.totalpage = Math.ceil( response.data.total_posts  / this.limit );
                this.currrentpage = page;
            })
            .catch(error => {
                console.error('There was an error making the GET request!', error);
            });
        }
    },
}
</script>
