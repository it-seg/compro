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