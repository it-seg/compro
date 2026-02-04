<script>
    document.addEventListener("DOMContentLoaded", () => {

        /* =========================
           ELEMENTS
        ========================= */
        const nav = document.querySelector(".navbar");
        const card = document.querySelector(".reservation-card");
        const aboutEls = document.querySelectorAll(".about-image, .about-content");
        const backBtn = document.getElementById("backToTop");
        const waBtn = document.querySelector(".wa-float");
        const ring = backBtn?.querySelector(".progress-ring");


        /* =========================
           STICKY NAV
        ========================= */
        function handleNavbar() {
            if (!nav) return;

            if (window.scrollY > 50) {
                nav.classList.add("scrolled");
            } else {
                nav.classList.remove("scrolled");
            }
        }


        /* =========================
           RESERVATION CARD REVEAL
        ========================= */
        function handleReservation() {
            if (!card) return;

            const rect = card.getBoundingClientRect();
            const trigger = window.innerHeight - 100;

            if (rect.top < trigger) {
                card.classList.add("show", "float");
            }
        }


        /* =========================
           ABOUT REVEAL
        ========================= */
        if ("IntersectionObserver" in window && aboutEls.length) {

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                    }
                });
            }, {
                threshold: 0.25
            });

            aboutEls.forEach(el => observer.observe(el));

        }


        /* =========================
           BACK TO TOP + WA FLOAT
        ========================= */
        if (backBtn && ring) {

            const radius = 45;
            const circumference = 2 * Math.PI * radius;

            ring.style.strokeDasharray = circumference;
            ring.style.strokeDashoffset = circumference;

            function handleBackToTop() {

                const scrollTop = window.scrollY;
                const maxScroll =
                    document.documentElement.scrollHeight - window.innerHeight;

                const progress = maxScroll > 0 ? scrollTop / maxScroll : 0;

                ring.style.strokeDashoffset =
                    circumference - (progress * circumference);

                if (scrollTop > 200) {
                    backBtn.classList.add("float-show");
                    waBtn?.classList.add("float-show");
                } else {
                    backBtn.classList.remove("float-show");
                    waBtn?.classList.remove("float-show");
                }
            }

            window.addEventListener("scroll", handleBackToTop);
            handleBackToTop();

            backBtn.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });

        }


        /* =========================
           MASTER SCROLL
        ========================= */
        function onScroll() {
            handleNavbar();
            handleReservation();
        }

        window.addEventListener("scroll", onScroll);
        onScroll();


        /* =========================
           INSTAGRAM SWIPER
        ========================= */
        if (document.querySelector('.ig-swiper')) {

            new Swiper('.ig-swiper', {
                slidesPerView: 'auto',
                spaceBetween: 18,
                grabCursor: true,
                autoHeight: false,
                watchOverflow: true,

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },

                breakpoints: {
                    320: {spaceBetween: 12},
                    768: {spaceBetween: 16},
                    1200: {spaceBetween: 18}
                }
            });

        }


        /* =========================
           EVENT SWIPER
        ========================= */
        if (document.querySelector('.event-swiper')) {

            new Swiper(".event-swiper", {

                slidesPerView: 3,
                spaceBetween: 25,
                grabCursor: true,

                navigation: {
                    nextEl: ".event-swiper .swiper-button-next",
                    prevEl: ".event-swiper .swiper-button-prev"
                },

                pagination: {
                    el: ".event-swiper .swiper-pagination",
                    clickable: true
                },

                breakpoints: {
                    0: {slidesPerView: 1.1},
                    600: {slidesPerView: 2},
                    992: {slidesPerView: 3}
                }

            });

        }


        /* =========================
           SPACE SWIPER
        ========================= */
        if (document.querySelector('.space-swiper')) {

            new Swiper(".space-swiper", {

                slidesPerView: 3,
                spaceBetween: 25,
                grabCursor: true,

                navigation: {
                    nextEl: ".space-swiper .swiper-button-next",
                    prevEl: ".space-swiper .swiper-button-prev"
                },

                pagination: {
                    el: ".space-swiper .swiper-pagination",
                    clickable: true
                },

                breakpoints: {
                    0: {slidesPerView: 1.1},
                    600: {slidesPerView: 2},
                    992: {slidesPerView: 3}
                }

            });

        }


        /* =========================
           MENU IMAGE TAB SWITCH
        ========================= */
        const tabs = document.querySelectorAll(".menu-tabs button");
        const pages = document.querySelectorAll(".menu-pages");

        if (tabs.length && pages.length) {

            tabs.forEach(btn => {

                btn.addEventListener("click", () => {

                    tabs.forEach(b => b.classList.remove("active"));
                    pages.forEach(p => p.classList.remove("active"));

                    btn.classList.add("active");
                    document.getElementById(btn.dataset.target)
                        ?.classList.add("active");

                    // update URL param
                    const url = new URL(window.location);
                    url.searchParams.set("section", btn.dataset.target);
                    window.history.replaceState({}, '', url);

                    // scroll to top menu
                    window.scrollTo({
                        top: document.querySelector('.menu-tabs')
                            .offsetTop - (nav?.offsetHeight || 80),
                        behavior: "smooth"
                    });

                });

            });

        }

    });
</script>

<script>
    (function () {
        function fixNavbarPadding() {
            const nav = document.querySelector('.navbar');
            const realH = nav ? nav.getBoundingClientRect().height : 76;
            document.documentElement.style.setProperty('--navbar-h', realH);
        }

        window.addEventListener('load', fixNavbarPadding);
        window.addEventListener('resize', fixNavbarPadding);
    })();
</script>

<!-- SPACE -->
<script>
    (function () {

        // pastikan Swiper sudah ter-load
        if (typeof Swiper === 'undefined') return;

        /* =========================
           SPACE DETAIL SWIPER
        ========================= */
        if (document.querySelector('.space-detail-swiper')) {
            new Swiper('.space-detail-swiper', {
                slidesPerView: 'auto',
                centeredSlides: true,
                spaceBetween: 40,
                grabCursor: true,
                loop: true,

                pagination: {
                    el: '.space-detail-swiper .swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.space-detail-swiper .swiper-button-next',
                    prevEl: '.space-detail-swiper .swiper-button-prev'
                },

                breakpoints: {
                    0: { spaceBetween: 24 },
                    768: { spaceBetween: 36 },
                    1200: { spaceBetween: 40 }
                }
            });
        }

        /* =========================
           SPACE LIST SWIPER
        ========================= */
        if (document.querySelector('.space-swiper')) {
            new Swiper('.space-swiper', {
                slidesPerView: 3,
                spaceBetween: 25,
                grabCursor: true,
                preventClicks: false,
                preventClicksPropagation: false,

                navigation: {
                    nextEl: '.space-swiper .swiper-button-next',
                    prevEl: '.space-swiper .swiper-button-prev'
                },
                pagination: {
                    el: '.space-swiper .swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    0:   { slidesPerView: 1.1 },
                    600: { slidesPerView: 2 },
                    992: { slidesPerView: 3 }
                }
            });
        }

    })();
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const popup      = document.getElementById('imagePopup');
        const popupImg   = document.getElementById('popupImage');
        const closeBtn   = document.querySelector('.popup-close');
        const prevBtn    = document.querySelector('.popup-nav.prev');
        const nextBtn    = document.querySelector('.popup-nav.next');

        if (!popup || !popupImg) return;

        const images = Array.from(document.querySelectorAll(
            '.space-split-hero img, .space-split-img img, .space-more-item img'
        ));

        if (!images.length) return;

        let currentIndex = 0;
        let startX = 0;

        function openPopup(index){
            currentIndex = index;
            popupImg.src = images[currentIndex].src;
            popup.classList.add('active');
        }

        function closePopup(){
            popup.classList.remove('active');
            popupImg.src = '';
        }

        function showPrev(){
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            popupImg.src = images[currentIndex].src;
        }

        function showNext(){
            currentIndex = (currentIndex + 1) % images.length;
            popupImg.src = images[currentIndex].src;
        }

        images.forEach((img, index) => {
            img.style.cursor = 'zoom-in';
            img.addEventListener('click', () => openPopup(index));
        });

        closeBtn?.addEventListener('click', closePopup);
        prevBtn?.addEventListener('click', showPrev);
        nextBtn?.addEventListener('click', showNext);

        popup.addEventListener('click', e => {
            if (e.target === popup) closePopup();
        });

        /* =========================
           TOUCH SWIPE (MOBILE)
        ========================= */
        popupImg.addEventListener('touchstart', e => {
            startX = e.touches[0].clientX;
        });

        popupImg.addEventListener('touchend', e => {
            const endX = e.changedTouches[0].clientX;
            const diff = endX - startX;

            if (Math.abs(diff) > 50){
                diff > 0 ? showPrev() : showNext();
            }
        });

        /* =========================
           KEYBOARD (DESKTOP)
        ========================= */
        document.addEventListener('keydown', e => {
            if (!popup.classList.contains('active')) return;

            if (e.key === 'ArrowLeft')  showPrev();
            if (e.key === 'ArrowRight') showNext();
            if (e.key === 'Escape')    closePopup();
        });

    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", () => {

        const triggers = document.querySelectorAll('.music-popup-trigger');
        const lightbox = document.getElementById('musicLightbox');
        const lightboxImg = document.getElementById('lightboxImg');

        if (!triggers.length || !lightbox || !lightboxImg) return;

        triggers.forEach(img => {
            img.addEventListener('click', () => {
                lightboxImg.src = img.dataset.full;
                lightbox.classList.add('active');
            });
        });

        lightbox.addEventListener('click', e => {
            if (
                e.target === lightbox ||
                e.target.classList.contains('lightbox-close')
            ) {
                lightbox.classList.remove('active');
                lightboxImg.src = '';
            }
        });

    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", () => {

        const triggers = Array.from(document.querySelectorAll('.music-popup-trigger'));
        const lightbox = document.getElementById('musicLightbox');
        const imgEl    = document.getElementById('lightboxImg');
        const prevBtn  = lightbox?.querySelector('.music-nav.prev');
        const nextBtn  = lightbox?.querySelector('.music-nav.next');

        if (!triggers.length || !lightbox || !imgEl) return;

        let current = 0;
        let startX  = 0;

        function openAt(index){
            current = index;
            imgEl.src = triggers[current].dataset.full;
            lightbox.classList.add('active');
        }

        function close(){
            lightbox.classList.remove('active');
            imgEl.src = '';
        }

        function prev(){
            current = (current - 1 + triggers.length) % triggers.length;
            imgEl.src = triggers[current].dataset.full;
        }

        function next(){
            current = (current + 1) % triggers.length;
            imgEl.src = triggers[current].dataset.full;
        }

        // CLICK IMAGE GRID
        triggers.forEach((img, i) => {
            img.style.cursor = 'zoom-in';
            img.addEventListener('click', () => openAt(i));
        });

        // CLOSE
        lightbox.addEventListener('click', e => {
            if (
                e.target === lightbox ||
                e.target.classList.contains('lightbox-close')
            ) close();
        });

        // BUTTON NAV
        prevBtn?.addEventListener('click', e => {
            e.stopPropagation();
            prev();
        });

        nextBtn?.addEventListener('click', e => {
            e.stopPropagation();
            next();
        });

        // KEYBOARD
        document.addEventListener('keydown', e => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'ArrowLeft')  prev();
            if (e.key === 'ArrowRight') next();
            if (e.key === 'Escape')    close();
        });

        // TOUCH SWIPE (MOBILE)
        imgEl.addEventListener('touchstart', e => {
            startX = e.touches[0].clientX;
        }, {passive:true});

        imgEl.addEventListener('touchend', e => {
            const diff = e.changedTouches[0].clientX - startX;
            if (Math.abs(diff) > 50){
                diff > 0 ? prev() : next();
            }
        });

    });
</script>






