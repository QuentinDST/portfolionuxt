<template>
    <div class="container-fluid main-container">
        <div class="footer-content">
            <nav class="footer-nav">
                <a href="#about" class="nav-link">A propos</a>
                <a href="#skills" class="nav-link">Skills</a>
                <a href="#timeline" class="nav-link">Formation</a>
                <a href="#portfolio" class="nav-link">Portfolio</a>
                <a href="#" class="nav-link">Contact</a>
            </nav>
            <div class="separator"></div>
            <div class="social-icons">
                <a href="https://github.com/votreprofilgithub" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/votreprofillinkedin" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
</template>
  
<style scoped>
.main-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
}

.footer-content {
    width: 100%;
    min-height: 80px;
    background-color: black;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
    box-shadow: 0px -10px 12px -8px rgba(0, 0, 0, 0.8);
}

.footer-nav {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.nav-link {
    margin: 0 40px;
    color: white;
    text-decoration: none;
    font-size: 18px;
    font-family: var(--body-font);
    transition: all 1s ease;
}

.nav-link:hover {
    color: var(--yellow-color) !important;
    letter-spacing: 2px;
}

.separator {
    width: 43vw;
    height: 1px;
    background-color: white;
    margin-bottom: 20px;
}

.social-icons {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.social-icons a {
    margin: 0 10px;
    color: white;
    font-size: 24px;
    text-decoration: none;
}

.social-icons a:hover{
    color: var(--yellow-color) !important;
}

@media screen and (max-width: 970px) {
    .footer-content {
        flex-direction: column;
    }

    .footer-nav {
        flex-direction: column;
        align-items: center;
    }

    .nav-link {
        margin: 5px 0;
    }

    .separator {
        width: 50%;
        margin: 20px auto;
    }
}
</style>
  