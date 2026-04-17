document.addEventListener("DOMContentLoaded", function () {

    /* HERO CAROUSEL */
    new bootstrap.Carousel('#heroSlider', {
        interval: 5000,
        pause: false,
        ride: 'carousel'
    });

    /* NAVBAR SCROLL */
    window.addEventListener("scroll", function() {
        document.querySelector(".navbar")
            .classList.toggle("scrolled", window.scrollY > 50);
    });

});

/* SERVICES ANIMATION */
const serviceCards = document.querySelectorAll('.card-service');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            serviceCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 120);
            });
        }
    });
}, { threshold: 0.2 });

observer.observe(document.querySelector('#services'));

/* =========================================
   SCROLL ANIMATION (BOLAK-BALIK)
========================================= */
const fadeElements = document.querySelectorAll('.fade-up');

const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show'); // 👈 INI KUNCINYA
        }

    });
}, {
    threshold: 0.2
});

fadeElements.forEach(el => fadeObserver.observe(el));

/* =========================================
   AUTO CLOSE NAVBAR (MOBILE)
========================================= */
document.querySelectorAll('.navbar .nav-link').forEach(link => {
    link.addEventListener('click', () => {

        const navbarCollapse = document.querySelector('.navbar-collapse');

        if (navbarCollapse.classList.contains('show')) {
            new bootstrap.Collapse(navbarCollapse).hide();
        }

    });
});