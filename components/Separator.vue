<template>
  <section class="container" :class="{ 'appear': isVisible }">
    <div class="row justify-content-center align-items-center separator-box">
      <div class="col-1 separator"></div>
      <div class="col-auto section-title text-center mb-5">
        <h2>{{ title }}</h2>
      </div>
      <div class="col-1 separator"></div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      isVisible: false
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    this.handleScroll(); // Check initial visibility
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll() {
      const sectionTop = this.$el.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const triggerPosition = windowHeight * 0.8;

      if (sectionTop < triggerPosition) {
        this.isVisible = true;
      } else {
        this.isVisible = false;
      }
    }
  }
};
</script>

<style scoped>
.container {
  transform: translateX(-100%);
  transition: transform 1.5s ease-in-out;
}

.container.appear {
  transform: translateX(0%);
}

.separator-box {
  padding: 10px;
  max-width: 750px;
  margin: 0 auto;
}

.separator {
  max-width: 600px;
  height: 2px;
  background-color: var(--grey-color);
}

.section-title {
  margin-top: 50px;
}

.section-title h2 {
  font-family: var(--title-font);
  color: var(--yellow-color);
  font-size: 55px;
  display: inline-block;
  position: relative;
}

@media (max-width: 600px) {
  .separator:first-child {
    margin-right: 30px;
  }

  .section-title h2{
    font-size: 40px;
  }
  .separator:last-child {
    margin-left: 30px;
  }
}
</style>
