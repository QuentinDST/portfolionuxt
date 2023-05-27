<template>
    <section class="container projects">
      <div class="section-title text-center">
        <h2>Projets les plus récents</h2>
        <hr>
      </div>
      <div   class="projects-container">
        <div class="project-card" v-for="project in projects" :key="project.id">
          <a :href="project.link" target="_blank" rel="noopener noreferrer">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img :src="project.image" alt="Project Image" class="project-image" />
                  <div class="overlay"></div>
                </div>
                <div class="flip-card-back">
                  <div class="overlay">
                    <h3>{{ project.title }}</h3>
                    <p>{{ project.description }}</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
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
    padding: 50px;
}

.section-title {
    margin-bottom: 100px;
}

.projects-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.project-card {
    flex: 0 0 auto;
    width: calc(33.33% - 60px);
    margin: 0 30px 50px 30px;
    box-sizing: border-box;
}

.project-card:hover {
    cursor: pointer;
}

.flip-card {
    background-color: transparent;
    perspective: 1000px;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 100%;
    transition: transform 1.1s;
    transform-style: preserve-3d;
}

.flip-card-front,
.flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.flip-card-front {
    transform: rotateY(0deg);
    box-shadow: 0 5px 11px rgba(0, 0, 0, 0.3);
}

.flip-card-back {
    transform: rotateY(180deg);
}

.project-image {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.project-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("@/assets/images/confiture.png");
    background-size: cover;
    background-position: center;
    opacity: 2;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--yellow-color);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    opacity: 0;
    transition: opacity 0.3s;
}

.project-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}

.project-card:hover .overlay {
    opacity: 1;
}

@media screen and (max-width: 992px) {
    .project-card {
        width: calc(50% - 60px);  
}

@media screen and (max-width: 576px) {
    .project-card {
        width: 100%;  
        margin: 0 0 60px 0;
    }
}
}
</style>
  