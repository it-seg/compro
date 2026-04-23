document.addEventListener("DOMContentLoaded", function () {
    /* =====================================================
       HELPERS
    ===================================================== */
    const qs = (selector, scope = document) => scope.querySelector(selector);
    const qsa = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));
    const isTabletOrMobile = () => window.innerWidth <= 991;
    const isMobile = () => window.innerWidth <= 768;

    function createObserver(elements, options, onIntersect, onExit) {
        if (!elements.length || typeof IntersectionObserver === "undefined") {
            return null;
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    if (typeof onIntersect === "function") {
                        onIntersect(entry.target, entry);
                    }
                } else if (typeof onExit === "function") {
                    onExit(entry.target, entry);
                }
            });
        }, options);

        elements.forEach((el) => observer.observe(el));
        return observer;
    }

    function getTranslateX(element) {
        if (!element) {
            return 0;
        }

        const style = window.getComputedStyle(element);
        const transform = style.transform;

        if (!transform || transform === "none") {
            return 0;
        }

        const matrix = new DOMMatrixReadOnly(transform);
        return matrix.m41;
    }

    /* =====================================================
       HERO
    ===================================================== */
    const heroSlider = qs("#heroSlider");

    if (heroSlider && typeof bootstrap !== "undefined") {
        bootstrap.Carousel.getOrCreateInstance(heroSlider, {
            interval: 4000,
            pause: false,
            ride: "carousel"
        });
    }

    /* =====================================================
       NAVBAR
    ===================================================== */
    const navbar = qs(".navbar");
    const navbarCollapseEl = qs("#nav");
    const navbarToggler = qs(".navbar-toggler");

    if (navbar) {
        window.addEventListener("scroll", function () {
            navbar.classList.toggle("scrolled", window.scrollY > 50);
        });
    }

    if (navbarCollapseEl && navbarToggler && typeof bootstrap !== "undefined") {
        const navbarCollapse = bootstrap.Collapse.getOrCreateInstance(navbarCollapseEl, {
            toggle: false
        });

        navbarToggler.addEventListener("click", function (event) {
            event.preventDefault();

            if (navbarCollapseEl.classList.contains("show")) {
                navbarCollapse.hide();
            } else {
                navbarCollapse.show();
            }
        });

        qsa("#nav .nav-link").forEach((link) => {
            link.addEventListener("click", function () {
                if (isTabletOrMobile() && navbarCollapseEl.classList.contains("show")) {
                    navbarCollapse.hide();
                }
            });
        });
    }

    /* =====================================================
       GLOBAL FADE ANIMATION
    ===================================================== */
    createObserver(
        qsa(".fade-up"),
        { threshold: 0.2 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    /* =====================================================
       SERVICES
    ===================================================== */
    createObserver(
        qsa(".card-service"),
        { threshold: 0.2 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    /* =====================================================
       VISION
    ===================================================== */
    createObserver(
        qsa(".vision-animate"),
        { threshold: 0.2 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    const visionWrap = qs("#visionApple");
    createObserver(
        visionWrap ? [visionWrap] : [],
        { threshold: 0.35 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    /* =====================================================
       NEWS
    ===================================================== */
    createObserver(
        qsa(".news-animate"),
        { threshold: 0.2 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    const modalEl = qs("#newsModal");
    const modalTitle = qs("#modalTitle");
    const modalDesc = qs("#modalDesc");
    const modalImage = qs("#modalImage");

    if (modalEl && modalTitle && modalDesc && modalImage && typeof bootstrap !== "undefined") {
        const newsModal = bootstrap.Modal.getOrCreateInstance(modalEl);

        qsa(".btn-readmore").forEach((button) => {
            button.addEventListener("click", function () {
                modalTitle.innerText = button.dataset.title || "";
                modalDesc.innerText = button.dataset.desc || "";
                modalImage.src = button.dataset.img || "";
                newsModal.show();
            });
        });

        modalEl.addEventListener("hidden.bs.modal", function () {
            modalImage.src = "";
        });
    }

    /* =====================================================
       BRANDS
    ===================================================== */
    createObserver(
        qsa(".brand-premium-tile"),
        { threshold: 0.12 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    /* =====================================================
       CAREER
    ===================================================== */
    const careerSection = qs(".career-animate");
    const careerTrack = qs(".career-track");
    const careerItems = qsa(".career-item");
    const careerPrev = qs(".career-nav.prev");
    const careerNext = qs(".career-nav.next");

    createObserver(
        careerSection ? [careerSection] : [],
        { threshold: 0.2 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );

    if (careerTrack && careerPrev && careerNext && careerItems.length) {
        let careerScrollAmount = 0;
        let careerIndex = 0;
        const careerScrollStep = 300;

        function stopCareerAnimation() {
            const currentX = getTranslateX(careerTrack);
            careerTrack.style.animation = "none";
            careerTrack.style.transform = `translateX(${currentX}px)`;
            careerScrollAmount = Math.abs(currentX);
        }

        function startCareerAnimation() {
            careerTrack.style.animation = "scrollCareer 25s linear infinite";
        }

        function updateCareerSlide() {
            const width = careerTrack.clientWidth;
            careerTrack.style.transform = `translateX(-${careerIndex * width}px)`;
        }

        careerNext.addEventListener("click", function () {
            if (isMobile()) {
                if (careerIndex < careerItems.length - 1) {
                    careerIndex += 1;
                    updateCareerSlide();
                }
                return;
            }

            stopCareerAnimation();
            careerScrollAmount += careerScrollStep;
            careerTrack.style.transform = `translateX(-${careerScrollAmount}px)`;
            setTimeout(startCareerAnimation, 2000);
        });

        careerPrev.addEventListener("click", function () {
            if (isMobile()) {
                if (careerIndex > 0) {
                    careerIndex -= 1;
                    updateCareerSlide();
                }
                return;
            }

            stopCareerAnimation();
            careerScrollAmount -= careerScrollStep;
            if (careerScrollAmount < 0) {
                careerScrollAmount = 0;
            }
            careerTrack.style.transform = `translateX(-${careerScrollAmount}px)`;
            setTimeout(startCareerAnimation, 2000);
        });
    }

    /* =====================================================
       FOOTER
    ===================================================== */
    const footer = qs(".footer-animate");
    createObserver(
        footer ? [footer] : [],
        { threshold: 0.2 },
        (target) => target.classList.add("show"),
        (target) => target.classList.remove("show")
    );
});
