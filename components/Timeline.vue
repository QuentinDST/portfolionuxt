<template>
    <section class="container timeline-box">
        <div class="buttons">
      <button
        class="timeline-button"
        @click="showExperience = true; showEducation = false"
      >
        EXPERIENCES
      </button>
      <button
        class="timeline-button"
        @click="showExperience = false; showEducation = true"
      >
        DIPLOMES
      </button>
    </div>
        <div class="timeline">
            <div class="timeline-items">
                <div class="timeline-item" v-for="item in timelineData" :key="item.id" :class="{ experience: item.type === 'experience', education: item.type === 'education' }"
                    v-show="(item.type === 'experience' && showExperience) || (item.type === 'education' && showEducation)">
                    <div class="timeline-icon"></div>
                    <div class="timeline-content">
                        <h2>{{ item.title }}</h2>
                        <p>{{ item.date }}</p>
                        <p>{{ item.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
  
<script>
export default {
    data() {
        return {
            showExperience: true,
            showEducation: false,
            timelineData: [
                { id: 1, type: 'experience', title: 'Patissier', date: '2012 - 2019', content: 'Patissier' },
                { id: 2, type: 'education', title: 'Baccalauréat', date: '2007 - Bac littéraire', content: 'Options Théatre' },
                { id: 3, type: 'education', title: 'Developpeur Web', date: '2023 - Developpeur Web & Web mobile', content: 'Greta Mende' },
            ]
        }
    }
}
</script>
  
<style scoped>

.timeline-box{
    margin-top: 90px;
    margin-bottom: 60px;
    background-color: var(--body-color);
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 50px 50px 200px 50px;
}
.buttons {
    display: flex;
    justify-content: center;
    margin-bottom: 100px;
    gap: 50px;
}

.timeline {
    position: relative;
    width: 100%;
    height: 50px;
}

.timeline-button {
    background-color: var(--yellow-color);
    color: var(--white-color);
    border: none;
    cursor: pointer;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    border-radius: 4px;
    width: 30%;
}

.timeline-button:hover {
    background-color: #555;
    color: white;
}

.timeline:before {
    content: '';
    position: absolute;
    top: 24px;
    width: 100%;
    height: 2px;
    background: var(--yellow-color);
}

.timeline-items {
    display: flex;
    justify-content: space-between;
}

.timeline-item {
    flex: 1;
    position: relative;
}

.timeline-icon {
    position: absolute;
    top: 10px;
    left: calc(50% - 15px);
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid var(--yellow-color);
    background: var(--white-color);
}

.timeline-content {
    position: absolute;
    top: 50px;
    width: 100%;
    text-align: center;
}

@media (max-width: 768px) {
  .buttons {
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
  }

  .timeline-content H2 {
    font-size: 16px;
  }

  .timeline-content{
    font-size: 12px;
  }
}

@media screen and (max-width: 576px) {
    .timeline-button {
        font-size: 16px;
        width: 80%;
        padding: 8px;
        margin: 4px auto; 
    }
}
</style>
  