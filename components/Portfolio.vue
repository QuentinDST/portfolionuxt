<template>
    <section class="container-fluid projects">
        <div class="section-title text-center">
            <h2>Projets les plus récents</h2>
            <hr>
        </div>
        <div class="boxed-content">
            <div class="projects-container">
                <div class="card" v-for="project in projects" :key="project.id">
                    <a :href="project.link" target="_blank" rel="noopener noreferrer">
                        <div class="image">
                            <img :src="project.image" alt="Project Image" class="project-image" />
                        </div>
                        <div class="details">
                            <div class="center">
                                <h3>{{ project.title }}</h3>
                                <p>{{ project.description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
  
<script>
export default {
    data() {
        return {
            projects: [
                {
                    id: 1,
                    image: require('@/assets/images/confiture.png'),
                    title: 'Confiture Cocotte',
                    description: 'Premier projet réalisé avec HTML et CSS',
                    link: 'https://confiturecocotte.netlify.app'
                },
                {
                    id: 2,
                    image: require('@/assets/images/limitedwo.png'),
                    title: 'Limited Woo',
                    description: 'Site statique réalisé en HTML et CSS',
                },
                {
                    id: 3,
                    image: require('@/assets/images/flowers.png'),
                    title: 'Flowers',
                    description: 'Site statique réalisé en HTML et CSS',
                    link: 'https://flowershenry.netlify.app'
                },
            ],
        };
    },
};
</script>
  
<style scoped>
.projects {
    margin-top: 90px;
    margin-bottom: 70px;
    background-color: var(--body-color);
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-bottom: #dddddd solid 1px;
    padding: 50px;
}

.boxed-content {
    max-width: 1410px;
    margin-left: auto;
    margin-right: auto;
}

.section-title {
    margin-bottom: 100px;
}

.projects-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.card:hover {
    cursor: pointer;
}

.card {
    width: calc(33.33% - 60px);
    margin: 0 30px 50px 30px;
    box-sizing: border-box;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.card a{
    color: var(--yellow-color);
    text-decoration: none;
}
.card .image {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.card .image img {
    width: 100%;
    transition: 1s;
}

.card:hover .image img {
    opacity: .5;
    transform: translateX(30%);
}

.card .details {
    position: absolute;
    top: 0;
    left: 0;
    width: 70%;
    height: 100%;
    background: var(--yellow-color);
    transition: .8s;
    transform-origin: left;
    transform: perspective(2000px) rotateY(-90deg);
}

.card:hover .details {
    transform: perspective(2000px) rotateY(0deg);
}

.card .details .center {
    padding: 20px;
    text-align: center;
    background: #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.card .details .center h1 {
    margin: 0;
    padding: 0;
    color: #ff3636;
    line-height: 20px;
    font-size: 20px;
    font-family: var(--body-font);
    text-transform: uppercase;
}

.card .details .center p {
    margin: 10px 0;
    padding: 0;
    color: #262626;
}

@media screen and (max-width: 992px) {
    .card {
        width: calc(50% - 60px);
    }
}

@media screen and (max-width: 576px) {
    .card {
        width: 100%;
        margin: 0 0 60px 0;
    }
}
</style>