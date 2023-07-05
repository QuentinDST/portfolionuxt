<template>
    <section class="container-fluid timeline-box">
        <div class="boxed-content">
            <div class="buttons">
                <button class="timeline-button" @click="showExperience = true; showEducation = false">
                    EXPERIENCES
                </button>
                <button class="timeline-button" @click="showExperience = false; showEducation = true">
                    DIPLOMES
                </button>
            </div>
            <div class="timeline">
                <div class="timeline-items">
                    <div class="timeline-item" v-for="item in timelineData" :key="item.id"
                        :class="{ experience: item.type === 'experience', education: item.type === 'education' }"
                        v-show="(item.type === 'experience' && showExperience) || (item.type === 'education' && showEducation)">
                        <div class="timeline-icon"></div>
                        <div class="timeline-content">
                            <div class="content-title">
                                <h2>{{ item.title }}</h2>
                            </div>
                            <div class="content-date">
                                <p>{{ item.date }}</p>
                            </div>
                            <div class="content-description">
                                <p>{{ item.content }}</p>
                            </div>
                        </div>
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
                { id: 1, type: 'experience', title: 'Assistant dirigeant d\'entreprise artisanale', date: '2012 - 2021', content: 'Patisserie' },
                { id: 3, type: 'experience', title: 'Developpeur Web', date: '2023', content: 'Stagiaire développeur/intégrateur chez BM-Services durant 12 Semaines' },
                { id: 4, type: 'education', title: 'Baccalauréat', date: '2006 - 2007', content: 'Options Théatre' },
                { id: 5, type: 'education', title: 'Préparation Licence de droit', date: '2007 -2008', content: 'UFR Droit Montpellier 34000' },
                { id: 6, type: 'education', title: 'Titre Professionnel Developpeur Web & Web mobile', date: '2023', content: 'Greta Mende' },
            ]
        }
    }
}
</script>
  
<style scoped>
.boxed-content {
    max-width: 1410px;
    margin: 0 auto;
    padding: 0 15px;
}

.timeline-box {
    margin-top: 90px;
    margin-bottom: 60px;
    background-color: var(--body-color);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-bottom: #dddddd solid 1px;
    padding: 50px 50px 200px 50px;
    height: 65vh;
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

@keyframes gradient {
    0% {
        background-position: 100% 0;
    }

    100% {
        background-position: 0 100%;
    }
}

.timeline:before {
    content: '';
    position: absolute;
    top: 24px;
    width: 100%;
    height: 4px;
    background: var(--dark-gray-color);
    background: linear-gradient(270deg, transparent 30%, var(--yellow-color), transparent 60%);
    background-size: 200% 200%;
    animation: gradient 6s linear infinite;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
    top: 80px;
    width: 80%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: auto;
}

.content-title, .content-date, .content-description {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%; 
}

.content-title {
    flex: 0.4;
}

.content-title H2{
    font-family: var(--title-font);
    color: var(--grey-color);
    font-weight: lighter;
    font-size: 26px;
}
.content-date, .content-description {
    flex: 0.3;
}

.content-date p {
    font-size: 20px;
    font-family: var(--body-font2);
}

.content-description {
    font-size: 20px;
    font-family: var(--body-font2);
}



@media (max-width: 768px) {
    .buttons {
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
    }

    .content-title H2 {
        font-size: 16px;
    }

    .content-description p {
        font-size: 12px;
    }

    .timeline-box{
        height: 70vh;
    }
}

@media screen and (max-width: 576px) {
    .timeline-button {
        font-size: 16px;
        width: 80%;
        padding: 8px;
        margin: 4px auto;
    }

    .content-title H2 {
        font-size: 14px;
    }

    .content-description p {
        font-size: 12px;
    }

    .content-date p {
    font-size: 10px;
    font-family: var(--body-font2);
}
}
</style>
  