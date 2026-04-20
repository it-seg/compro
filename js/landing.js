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

/* =========================================
   SERVICES OBSERVER (CLEAN)
========================================= */
const serviceCards = document.querySelectorAll('.card-service');

const serviceObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show'); // optional (biar repeat)
        }
    });
}, { threshold: 0.2 });

serviceCards.forEach(card => serviceObserver.observe(card));

/* =========================================
   BRAND FADE IN & OUT
========================================= */
const brandSection = document.querySelector('#brands');
const brandItems = document.querySelectorAll('.brand-item');

const brandObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {
            brandSection.classList.remove('fade-out');

            brandItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('show');
                }, index * 100); // stagger
            });

        } else {
            brandSection.classList.add('fade-out');

            brandItems.forEach(item => {
                item.classList.remove('show');
            });
        }

    });
}, { threshold: 0.2 });

brandObserver.observe(brandSection);

/* =========================================
   BRAND PRE & NEXT
========================================= */
const track = document.querySelector('.brand-track');
const items = document.querySelectorAll('.brand-item');
const prevBtn = document.querySelector('.brand-nav.prev');
const nextBtn = document.querySelector('.brand-nav.next');

let scrollAmount = 0;
const scrollStep = 200;
let index = 0;

// DETECT MOBILE
function isMobile() {
    return window.innerWidth <= 768;
}

// =============================
// DESKTOP HELPERS
// =============================
function getTranslateX() {
    const style = window.getComputedStyle(track);
    const matrix = new WebKitCSSMatrix(style.transform);
    return matrix.m41;
}

function stopAnimation() {
    const currentX = getTranslateX();
    track.style.animation = 'none';
    track.style.transform = `translateX(${currentX}px)`;
    scrollAmount = Math.abs(currentX);
}

function startAnimation() {
    track.style.animation = 'scrollBrand 25s linear infinite';
}

// =============================
// MOBILE SLIDE
// =============================
function updateSlide() {
    const width = track.clientWidth;
    track.style.transform = `translateX(-${index * width}px)`;
}

// =============================
// NEXT BUTTON
// =============================
nextBtn.addEventListener('click', () => {

    if (isMobile()) {
        if (index < items.length - 1) {
            index++;
            updateSlide();
        }
    } else {
        stopAnimation();
        scrollAmount += scrollStep;
        track.style.transform = `translateX(-${scrollAmount}px)`;
        setTimeout(startAnimation, 2000);
    }

});

// =============================
// PREV BUTTON
// =============================
prevBtn.addEventListener('click', () => {

    if (isMobile()) {
        if (index > 0) {
            index--;
            updateSlide();
        }
    } else {
        stopAnimation();
        scrollAmount -= scrollStep;
        if (scrollAmount < 0) scrollAmount = 0;
        track.style.transform = `translateX(-${scrollAmount}px)`;
        setTimeout(startAnimation, 2000);
    }

});

// =============================
// NEWS MODAL
// =============================
const modalEl = document.getElementById('newsModal');
const modal = new bootstrap.Modal(modalEl);

document.querySelectorAll('.btn-readmore').forEach(btn => {

    btn.addEventListener('click', () => {

        document.getElementById('modalTitle').innerText = btn.dataset.title;
        document.getElementById('modalDesc').innerText = btn.dataset.desc;
        document.getElementById('modalImage').src = btn.dataset.img;

        modal.show();
    });

});

// RESET IMAGE biar tidak flicker
modalEl.addEventListener('hidden.bs.modal', () => {
    document.getElementById('modalImage').src = '';
});


// =============================
// VISI MISI
// =============================

const visionItems = document.querySelectorAll('.vision-animate');

const visionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show'); // biar bisa repeat
        }

    });
}, { threshold: 0.2 });

visionItems.forEach(el => visionObserver.observe(el));