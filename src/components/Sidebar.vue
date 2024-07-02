<template>
    <div class="sidebar clear">
        <div class="samesidebar clear">
            <h2>Categories</h2>
            <ul>
                <li v-for="(cat, index) in cats" :key="index"><router-link :to="{name:'catepage', params:{id:cat.id}}">{{ cat.cat }}</router-link></li>
            </ul>
        </div>
        <div class="samesidebar clear">
            <h2>Latest articles</h2>
            <div class="popular clear" v-for="(item, index) in related" :key="index">
                <h2><router-link :to="{name:'signlepage',params:{ id: item.id }}">{{ item.title }}</router-link></h2>
                <a href="#"><img :src="item.img" alt="post image" /></a>
                <p>{{ truncateText( item.desccription,50) }}</p>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:'Sidebar',
    props:['id'],
    data() {
        return {
            cats:[],
            related:[]
        }
    },
    mounted(){
        this.getcategory();
        this.getrelatedpost();
    },
    methods: {
        getcategory() {
            axios.get(`http://localhost/blog-website/src/Api/Api.php?action=category`)
            .then(response => {
                if (response.status == 200 ) {
                    this.cats = response.data.user_cat;
                   
                } else {
                    console.error('server error', error);
                }
                
            })
            .catch(error => {
                console.error('There was an error making the GET request!', error);
            });
        },
        getrelatedpost() {
            axios.get(`http://localhost/blog-website/src/Api/Api.php?action=related`)
            .then(response => {
                if (response.status == 200 ) {
                    this.related = response.data.user_rel;
                   
                } else {
                    console.error('server error', error);
                }
                
            })
            .catch(error => {
                console.error('There was an error making the GET request!', error);
            });
        },
        truncateText(word,wordlimt){
            let words = word.split(' ');
            if (words >= wordlimt) {
                return word;
            }
            return words.slice(0,wordlimt).join(' ')+'...';
            
        }

    },
}
</script>

<style lang="scss" scoped>

</style>