<template>
  <div class="about-section">
    <div class="container-fluid">
      <div id="about" class="row align-items-center about-me">
        <div class="col-md-6">
          <div class="profile-image">
            <img v-if="showImage" :src="profileImage" alt="Profile Image" class="img-profil image-appear" />
          </div>
        </div>
        <div class="col-md-6 text">
          <p class="about-text"> Bonjour! Je m'appelle Quentin DESTRADE et j'ai 33 ans. </p>
          <p class="about-text">Actuellement étudiant stagiaire au Greta Mende et inscrit à la formation
            développeur web et web mobile, je
            souhaite à terme développer mes compétences et les mettre à profit au service d'une entreprise dynamique,
            avec une apétence certaine pour le front-end.
          </p>
          <p class="about-text">Sérieux, dynamique et souriant, je m’intègre facilement au travail en équipe et m’adapte à
            toute situation.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import profileImage from '@/assets/images/me.png';

export default {
  data() {
    return {
      profileImage,
      showImage: false, //initialisé à false
    };
  },
  mounted() {
    // détecte l'arrivée sur la section "about"
    const options = {
      rootMargin: '0px',
      threshold: 0.5,
    };
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // si on arrive sur la section "about", j'ajoute la classe "show" pour faire apparaître l'image avec une transition
          this.showImage = true;
          observer.unobserve(entry.target);
        }
      });
    }, options);
    observer.observe(document.querySelector('#about'));
  },
};
</script>

<style scoped>

.about-section{
  margin-bottom: 150px;
}
.about-me {
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-image {
  display: flex;
  align-items: center;
  justify-content: center;
  max-width: 300px;
  max-height: 300px;
  border-radius: 100%;
  overflow: hidden;
  margin: 0 auto;
}

.profile-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.about-text {
  font-family: var(--body-font);
  font-size: 20px;
  font-weight: bolder;
  margin-left: -150px;
  margin-right: 100px;
  display: flex;
  flex-direction: column;
}

.profile-image img {
  opacity: 0;
  animation: fadeIn 4s ease-in forwards;
}

/* KEY FRAMES */

@keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

/* MEDIA QUERIES */

@media (max-width: 1300px) {
  .about-text {
    font-family: var(--body-font);
    font-size: 18px;
    margin-left: -50px;
    margin-right: 100px;
  }
}

@media (max-width: 990px) {
  .about-me {
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .about-text {
    margin-left: 0;
    margin-right: 0;
    text-align: center;
  }

  .text {
    margin-top: 50px;
  }
}
</style>