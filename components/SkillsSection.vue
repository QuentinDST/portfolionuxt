<template>
  <section class="container-fluid full-width">
    <div class="boxed-content">
      <div class="card-skills-container">

        <div class="card" v-for="(card, index) in cards" :key="index">
          <div class="header">
            <img :src="card.svgPath" class="icon" />
            <h2 class="title">{{ card.title }}</h2>
          </div>
          <ul class="list">
            <li v-for="(item, i) in card.listItems" :key="i">
              <p>{{ item.name }}</p>
              <div class="circles">
                <div v-for="n in 10" :key="n" :class="n <= item.level ? 'checked' : 'unchecked'"></div>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      cards: [
        {
          title: "Langages",
          listItems: [
            { name: "HTML 5", level: 9 },
            { name: "CSS 3", level: 8 },
            { name: "JavaScript", level: 6 },
            { name: "PHP", level: 7 },
          ],
          svgPath: require('@/assets/svg/code-solid.svg')
        },
        {
          title: "Base de Données",
          listItems: [
            { name: "Merise MCD", level: 7 },
            { name: "SQL", level: 8 },
            { name: "MYSQL", level: 8 },
            { name: "HeidiSQL", level: 7 },
          ],
          svgPath: require('@/assets/svg/database-solid.svg')
        },
        {
          title: "CMS",
          listItems: [
            { name: "WordPress", level: 7 },
            { name: "PrestaShop", level: 3 },
          ],
          svgPath: require('@/assets/svg/wordpress.svg')
        },
        {
          title: "Outils",
          listItems: [
            { name: "VSCode", level: 8 },
            { name: "Git", level: 6 },
            { name: "FIGMA", level: 6 },
            { name: "WP-CLI", level: 4 },
          ],
          svgPath: require('@/assets/svg/screwdriver-wrench-solid.svg')
        },
        {
          title: "FrameWork FRONT",
          listItems: [
            { name: "Vue.Js", level: 6 },
            { name: "Nuxt.Js", level: 7 },
          ],
          svgPath: require('@/assets/svg/node-js.svg')
        },
        {
          title: "Framework BACK",
          listItems: [
            { name: "Symfony", level: 7 },

          ],
          svgPath: require('@/assets/svg/symfony.svg')
        },
        {
          title: "WORKFLOW",
          listItems: [
            { name: "Méthode Agile", level: 6 },
            { name: "POO", level: 6 },
            { name: "MVC", level: 6 },
          ],
          svgPath: require('@/assets/svg/stack-overflow.svg')
        },
      ],
    };
  },
};
</script>


<style scoped>
.full-width {
  width: 100%;
  height: auto;
  background-color: var(--body-color);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-bottom: #dddddd solid 1px;
  margin-top: 90px;
  margin-bottom: 90px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.boxed-content {
  width: 1410px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
}

.card-skills-container {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.card {
  width: calc(25% - 60px);
  height: auto;
  box-sizing: content-box;
  padding: 30px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  margin: 50px;
}

.header {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.header img {
  max-width: 30px;
  max-height: 30px;
  margin-right: 30px;
  color: var(--yellow-color);
}

.icon-skill svg {
  fill: var(--yellow);
  font-size: 19px;
}

.title {
  margin-bottom: 0;
  font-family: var(--title-font);
  font-size: 28px;

}

.list {
  margin-top: 30px;
  padding: 0;
  list-style-type: none;
}

.list p {
  margin-bottom: 0;
  font-family: var(--body-font2);
  font-size: 18px;
}

.checked {
  display: inline-block;
  width: 8px;
  height: 9px;
  border-radius: 50%;
  margin-right: 10px;
  background-color: var(--yellow-color);
}

.unchecked {
  display: inline-block;
  width: 8px;
  height: 9px;
  border-radius: 50%;
  margin-right: 10px;
  background-color: var(--yellow-color-unchecked);
}

@media (max-width: 1024px) {
  .card {
    width: calc(100% - 60px);
    margin: 20px auto;
  }

  .card-skills-container {
    flex-direction: column;
  }
}
</style>