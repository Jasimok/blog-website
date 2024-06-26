<template>
    <div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>{{ posts.title }}</h2>
				<h4>{{ posts.date }}, By {{ posts.author }}</h4>
				<img :src="posts.img" alt="MyImage"/>
				<p>{{ posts.desccription }}</p>
	        </div>
		</div>
        <Sidebar />
		
	</div>
</template>

<script>
import axios from 'axios';
import Sidebar from "../components/Sidebar.vue";
    export default {
        name:'SinglePage',
        components: {
            Sidebar
        },
        props:['id'],
        data() {
            return {
                posts: {}
            }
        },
        mounted(){
            axios.get(`http://localhost/blog-website/src/Api/Api.php?action=selectById&id=${this.id}`)
            .then(response => {
                if (response.status == 200 ) {
                    this.posts = response.data.post;
                } else {
                    console.error('server error', error);
                }
                
            })
            .catch(error => {
                console.error('There was an error making the GET request!', error);
            });
        }
    }
</script>

<style lang="scss" scoped>

</style>