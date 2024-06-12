<template>
    <div class="headersection templete clear">
        <a href="#">
            <div class="logo">
                <img src="../assets/img/logo.png" alt="Logo" />
                <h2>Website Title</h2>
                <p>Our website description</p>
            </div>
        </a>
        <div class="social clear">
            <div class="icon clear">
                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="searchbtn clear">
                <form action="" method="post">
                    <input type="text" name="keyword" placeholder="Search keyword..." />
                    <input type="submit" name="submit" value="Search" />
                </form>
            </div>
        </div>
    </div>
    <div class="navsection templete">
        <ul>
            <li><router-link :to="{ name: 'home' }">Home</router-link></li>
            <li><router-link :to="{ name: 'about' }">About</router-link></li>
            <li><router-link :to="{ name: 'contact' }">Contact</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'NavComponent'
}
</script>

<style scoped></style>