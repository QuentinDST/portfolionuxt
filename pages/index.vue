<template>
  <div>
    <Header />
    <AboutSection />
    <Separator id="skills" title="SKILLS" />
    <SkillsSection />
    <Separator id="timeline" title="DIPLOME" />
    <Timeline />
    <Separator id="portfolio" title="PORTFOLIO" />
    <Portfolio />
    <Separator id="contact" title="CONTACT" />
    <ContactForm />
    <Footer />
  </div>
</template>

<script>
import Header from '~/components/Header.vue';
import AboutSection from '~/components/AboutSection.vue';
import Separator from '~/components/Separator.vue';
import SkillsSection from '~/components/SkillsSection.vue';
import Timeline from '~/components/Timeline.vue';
import Portfolio from '~/components/Portfolio.vue';
import ContactForm from '~/components/ContactForm.vue';
import Footer from '~/components/Footer.vue';

export default {
  components: {
    Header,
    AboutSection,
    Separator,
    SkillsSection,
    Timeline,
    Portfolio,
    ContactForm,
    Footer,
  },
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

:root {
  --white-color: #fff;
  --yellow-color: #E1B648;
  --yellow-color-timeline: #997313;
  --yellow-color-unchecked: #f0e0ba;
  --black-color: #131313;
  --grey-color: #6A6464;
  --body-color: #fafafa;
  --body-font: 'Quattrocento Sans', sans-serif;
  --body-font2: 'Montserrat', sans-serif;
  --title-font: 'anton', sans-serif;
}


body, html {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  overflow-x: hidden;
}

body {
  font-family: var(--body-font);
  overflow-x: hidden;
}

html {
  scroll-behavior: smooth;
}

[id] {
  scroll-margin-top: 80px;
}

[id]:target {
  animation: fade-in 1.2s ease-in-out;
}

@keyframes fade-in {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

/* MEDIA QUERIES */

  header {
    animation: backgroundanim 5s ease 0s 1 normal forwards;
  }

  @keyframes backgroundanim {
    0% {
      background-position: center bottom;
      background-size: 100%;
    }

    100% {
      background-position: center bottom;
      background-size: 80%;
    }
  }

</style>