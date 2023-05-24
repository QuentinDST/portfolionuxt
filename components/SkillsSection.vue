<template>
  <section class="container-fluid">
    <div class="row section-skill justify-content-center">
      <div class="chevron1"></div>
      <div class="chevron2"></div>
      <div class="col-md-12 col-lg-2 text-center tools">
        <div>
          <h2 class="skill-title">Front-end</h2>
        </div>
        <div>
          <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JAVASCRIPT</li>
            <li>RESPONSIVE</li>
          </ul>
        </div>
      </div>

      <div class="col-md-12 col-lg-2 text-center tools">
        <div>
          <h2 class="skill-title">Tools</h2>
        </div>
        <div>
          <ul>
            <li>GITHUB</li>
            <li>BOOTSRAP</li>
            <li>FIGMA</li>
            <li>VSCODE</li>
          </ul>
        </div>
      </div>

      <div class="col-md-12 col-lg-2 text-center tools">
        <div>
          <h2 class="skill-title">Back-end</h2>
        </div>
        <div>
          <ul>
            <li>PHP</li>
            <li>BASE DE DONNEE</li>
            <li>...</li>
            <li>...</li>
          </ul>
        </div>
      </div>
      <div class="chevron3"></div>
      <div class="chevron4"></div>
    </div>
  </section>
</template>


<style scoped>

/*  CHEVRONS */

.chevron1 {
  width: 50px;
  height: 4px;
  background-color: var(--yellow-color);
  position: relative;
  top: -60px;
}

.chevron1::before {
  content: "";
  width: 50px;
  height: 4px;
  background-color: var(--yellow-color);
  top: 23px;
  left: -25px;
  transform: rotate(90deg);
  position: absolute;
}

.chevron2 {
  width: 20px;
  height: 3px;
  margin-top: 16px;
  margin-left: 16px;
  background-color: var(--yellow-color);
  position: relative;
  top: -60px;
  left: -50px;
}

.chevron2::before {
  content: "";
  width: 20px;
  height: 3px;
  background-color: var(--yellow-color);
  top: 9px;
  left: -10px;
  transform: rotate(90deg);
  position: absolute;
}

.chevron3 {
  bottom: -230px;
  width: 50px;
  height: 4px;
  background-color: var(--yellow-color);
  position: relative;
}

.chevron3::before {
  content: "";
  width: 50px;
  height: 4px;
  background-color: var(--yellow-color);
  bottom: 23px;
  left: 25px;
  transform: rotate(90deg);
  position: absolute;
}

.chevron4 {
  bottom: -230px;
  width: 20px;
  height: 3px;
  margin-top: -18px;
  margin-left: -40px;
  background-color: var(--yellow-color);
  position: relative;
}

.chevron4::before {
  content: "";
  width: 20px;
  height: 3px;
  background-color: var(--yellow-color);
  top: -9px;
  margin-left: 10px;
  transform: rotate(90deg);
  position: absolute;
}

.section-skill {
  margin-top: 120px !important;
  margin-bottom: 150px
}

.tools .skill-title {
  font-family: 'anton';
  font-weight: lighter;
  color: var(--grey-color);
  -webkit-transition: all 1s ease;
}

.section-skill,
ul {
  margin-top: 30px;
  padding: 0;
}

.section-skill,
ul,
li {
  list-style-type: none;
}

.skill,
.tools,
.quality {
  list-style-type: none;
}

.container .section-skill h2 {
  text-align: center;
}

.container .section-skill ul>li {
  font-style: italic;
  margin-top: 5px;
}

.tools {
  transition: all 1.2s ease;
}

.tools:hover {
  transform: scale(1.1);
}

.skill-title:hover {
  cursor: pointer;
  color: var(--black-color);
}

@media (max-width: 992px){
  .chevron1, .chevron1::before, .chevron2, .chevron2::before, .chevron3, .chevron3::before, .chevron4, .chevron4::before{
    display: none;
  }
}
</style>