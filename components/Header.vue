<template>
    <header
        :style="{ 'background-image': backgroundImage, width: '100vw', height: '100vh', 'background-size': 'cover', 'max-width': '100%' }">
        <b-navbar toggleable="lg" type="dark" class="justify-content-center custom-navbar">
            <b-navbar-toggle target="nav-collapse" class="mx-auto"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="text-center w-100">
                    <b-nav-item href="#about" class="nav-link mx-3">A propos</b-nav-item>
                    <b-nav-item href="#skills" class="nav-link mx-3">Skills</b-nav-item>
                    <b-nav-item href="#timeline" class="nav-link mx-3">Formation</b-nav-item>
                    <b-nav-item href="#portfolio" class="nav-link mx-3">Portfolio</b-nav-item>
                    <b-nav-item href="#" class="nav-link mx-3">Contact</b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
        <div class="header-title">
            <h1 class="text-fade-in">DEV.<br>
                WEB<br>
                JUNIOR<br>
            </h1>
        </div>
    </header>
</template>

<script>
import keyboardImage from '@/assets/images/keyboard-xl.jpg';

export default {
    computed: {
        backgroundImage() {
            return `url(${keyboardImage})`;
        },
    },
};
</script>

<style scoped>

header{
    margin-bottom: 100px;
}
.navbar-nav {
    justify-content: center;
}

.custom-navbar {
    background-color: black;
    width: 100%;
}

.navbar-toggler {
    margin-top: 15px;
}

.navbar-toggler-icon {
    color: var(--white-color) !important;
}

.b-nav-item {
    flex-grow: 1;
}

.nav-link {
    color: var(--white-color) !important;
    font-size: 25px;
    text-decoration: none;
    margin-left: 30px;
    position: relative;
    transition: all 0.5s ease;
}

.nav-link:hover {
    color: var(--yellow-color) !important;
    letter-spacing: 2px;
}

.header-title {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin-top: 170px;
    width: 100%;
    height: 100%;
}

.header-title h1 {
    max-width: 250px;
    max-height: 250px;
    text-align: center;
    font-family: var(--title-font);
    font-size: 60px;
    line-height: 1.2;
    transition: all 1s ease;
    color: var(--white-color);
}

.header-title h1:hover {
    cursor: pointer;
    text-shadow: 0 0 10px #FFFFFF, 2px 2px 7px rgba(206, 89, 55, 0.23);
    letter-spacing: 5px;
}

.text-fade-in {
    animation: 2s ease-in forwards;
}


@media (max-width: 990px) {
    .navbar-collapse {
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 20vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-title {
        margin-top: 110px;
    }

    header {
    background-position: center;
  }
}
</style>