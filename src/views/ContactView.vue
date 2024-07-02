<template>
    <div class="contentsection contemplete clear">
        <div class="maincontent clear">
            <div class="about">
                <h2>Contact us</h2>
            </div>
            <form method="post" @submit.prevent="FormSubmit()">
                <table>
                    <tr>
                        <td>Your First Name:</td>
                        <td>
                            <input type="text" v-model="fname" placeholder="Enter first name" required="1"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Last Name:</td>
                        <td>
                            <input type="text" v-model="lname" placeholder="Enter Last name" required="1" />
                        </td>
                    </tr>

                    <tr>
                        <td>Your Email Address:</td>
                        <td>
                            <input type="email" v-model="email" placeholder="Enter Email Address" required="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Your Message:</td>
                        <td>
                            <textarea v-model="message"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Submit" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ContactView',
    data() {
        return {
            fname: '',
            lname:'',
            email:'',
            message:''
        }
    },
    methods: {
        FormSubmit() {
            let formdata = new FormData();
            formdata.append('fname',this.fname);
            formdata.append('lname',this.lname);
            formdata.append('email',this.email);
            formdata.append('message',this.message);
            axios.get(`http://localhost/blog-website/src/Api/Api.php?action=login`,formdata)
            .then(response => {
                if (response.status == 200 ) {
                   console.log(response.data);
                } else {
                    console.error('server error', error);
                }
                
            })
            .catch(error => {
                console.error('There was an error making the GET request!', error);
            });
        }
    },
}
</script>

<style lang="scss" scoped></style>