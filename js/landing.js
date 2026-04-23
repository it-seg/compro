document.addEventListener("DOMContentLoaded", function () {
    /* =====================================================
       HELPERS
    ===================================================== */
    const qs = (selector, scope = document) => scope.querySelector(selector);
    const qsa = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));
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
                if (window.innerWidth <= 991 && navbarCollapseEl.classList.contains("show")) {
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
    const brandSection = qs("#brands");
    const brandTrack = qs(".brand-track");
    const brandItems = qsa(".brand-item");
    const brandPrev = qs(".brand-nav.prev");
    const brandNext = qs(".brand-nav.next");

    createObserver(
        brandSection ? [brandSection] : [],
        { threshold: 0.2 },
        () => {
            if (brandSection) {
                brandSection.classList.remove("fade-out");
            }

            brandItems.forEach((item, index) => {
                setTimeout(() => item.classList.add("show"), index * 80);
            });
        },
        () => {
            if (brandSection) {
                brandSection.classList.add("fade-out");
            }

            brandItems.forEach((item) => item.classList.remove("show"));
        }
    );

    if (brandTrack && brandPrev && brandNext && brandItems.length) {
        let brandScrollAmount = 0;
        let brandIndex = 0;
        const brandScrollStep = 200;

        function stopBrandAnimation() {
            const currentX = getTranslateX(brandTrack);
            brandTrack.style.animation = "none";
            brandTrack.style.transform = `translateX(${currentX}px)`;
            brandScrollAmount = Math.abs(currentX);
        }

        function startBrandAnimation() {
            brandTrack.style.animation = "scrollBrand 25s linear infinite";
        }

        function updateBrandSlide() {
            const width = brandTrack.clientWidth;
            brandTrack.style.transform = `translateX(-${brandIndex * width}px)`;
        }

        brandNext.addEventListener("click", function () {
            if (isMobile()) {
                if (brandIndex < brandItems.length - 1) {
                    brandIndex += 1;
                    updateBrandSlide();
                }
                return;
            }

            stopBrandAnimation();
            brandScrollAmount += brandScrollStep;
            brandTrack.style.transform = `translateX(-${brandScrollAmount}px)`;
            setTimeout(startBrandAnimation, 2000);
        });

        brandPrev.addEventListener("click", function () {
            if (isMobile()) {
                if (brandIndex > 0) {
                    brandIndex -= 1;
                    updateBrandSlide();
                }
                return;
            }

            stopBrandAnimation();
            brandScrollAmount -= brandScrollStep;
            if (brandScrollAmount < 0) {
                brandScrollAmount = 0;
            }
            brandTrack.style.transform = `translateX(-${brandScrollAmount}px)`;
            setTimeout(startBrandAnimation, 2000);
        });
    }

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
