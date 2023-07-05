<template>
  <div class="container-fluid full-width">
    <div class="boxed-content">

      <div class="image-div">
        <div class="profile-image">
          <img v-if="showImage" :src="profileImage" alt="Profile Image" class="img-profil image-appear" />
        </div>
      </div>

      <div id="about" class="about-div">
        <div class="about-me">
          <h1 class="about-title"> About. </h1>
          <p class="about-subtitle"> Hi ! Je m'appelle Quentin DESTRADE, j'ai 33 ans. </p>
          <p class="about-subtitle">Animé par la recherche de solutions efficientes, performantes et esthétique, je suis
            un developpeur alliant à la fois Front & Back. En quête constant de créativité et de technicité, mon objectif
            est de pouvoir créer des applications dynamique et moderne.</p>
          <p class="about-subtitle">Ma motivation et mon sens du détail me permettent aujourd'hui de livrer des résultats
            audacieux et d'assurer une réponse sérieuse aux besoins de chaque projet.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import profileImage from '@/assets/images/profil.png';

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
.full-width {
  background-color: var(--body-color);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-bottom: #dddddd solid 1px;
  height: auto;
  padding: 0;
  margin-bottom: 90px;
}

.boxed-content {
  width: 100%;
  max-width: 1410px;
  margin-top: 30px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.flex-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.flex-item {
  flex: 1;
  margin: 1em;
}

.image-div {
  display: flex;
  justify-content: center;
  align-items: flex-end;
  margin: 0;
}

.profile-image img {
  max-width: 85%;
  height: auto;
  opacity: 0;
  animation: fadeIn 4s ease-in forwards;
}

.about-div {
  display: flex;
  justify-content: center;
  align-items: center;
  flex: 1;
  overflow: auto;
  margin: 0;
  padding: 40px;
}

.about-me .about-title {
  font-size: 60px;
  font-family: var(--title-font);
  color: var(--black-color);
}

.about-me .about-subtitle {
  margin-top: 20px;
  font-size: 18px;
  font-family: var(--body-font2);
}

.about-text:nth-child(3) {
  margin-bottom: 0;
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

@media screen and (max-width: 800px) {
  .boxed-content {
    flex-direction: column;
  }

  .about-div {
    order: 1;
    margin-top: 20px;
  }

  .about-me {
    text-align: center;
  }

  .image-div {
    order: 2;
  }

  .profile-image {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .profile-image img {
    max-width: 60%;
    height: auto;
    opacity: 0;
    animation: fadeIn 4s ease-in forwards;
  }

  @media screen and (min-width: 800px) and (max-width: 1200px) {
  .about-me .about-title {
    font-size: 25px; 
  }
  
  .about-me .about-subtitle {
  margin-top: 20px;
  font-size: 14px;
  font-family: var(--body-font2);
}
}
}</style>

