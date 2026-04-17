<?php
$title = "FS Group | PT. Setyawan Eunike Gemilang";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --dark: #0b0f19;
            --gold: #d4af37;
            --text: #1e293b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
        }

        h1,h2,h3 {
            font-family: 'Playfair Display', serif;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(11,15,25,0.9);
            transition: 0.3s;
        }
        .navbar.scrolled {
            background: rgba(11,15,25,0.95);
        }
        .navbar a {
            color: #fff !important;
        }
        .navbar a:hover {
            color: var(--gold) !important;
        }

        /* HERO */
        .hero-slide {
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero-slide .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.4);
        }

        .hero-content {
            position: relative;
            color: #fff;
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            transition: 1s;
        }

        .carousel-item.active .hero-content {
            opacity: 1;
            transform: translateY(0);
        }

        /* SMOOTH FIX (no white flash) */
        .carousel-item {
            transition: opacity 1.2s ease-in-out !important;
        }

        .carousel-fade .carousel-item {
            opacity: 0;
        }

        .carousel-fade .carousel-item.active {
            opacity: 1;
        }

        .carousel,
        .carousel-inner,
        .carousel-item {
            background: #000;
        }

        .hero-slide {
            transform: scale(1);
            transition: transform 6s ease;
        }

        .carousel-item.active .hero-slide {
            transform: scale(1.05);
        }
        /* SECTION */
        .section {
            padding: 100px 0;
        }

        /* ABOUT */
        .about-box {
            background: #f1f5f9;
            padding: 60px;
            border-radius: 12px;
        }

        /* SERVICES */
        .card-service {
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #eee;
            transition: all 0.4s ease;

            opacity: 0;
            transform: translateY(40px);
        }

        .card-service.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* IMAGE */
        .card-service img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        /* BODY */
        .card-service .card-body {
            padding: 28px 24px;
            position: relative;
        }

        /* GOLD LINE VERTICAL (INI KUNCI ELEGANT) */
        .card-service .card-body::before {
            content: "";
            position: absolute;
            left: 0;
            top: 30px;
            width: 3px;
            height: 40px;
            background: var(--gold);
        }

        /* TITLE */
        .card-service h5 {
            font-size: 16px;
            letter-spacing: 1.2px;
            font-weight: 600;
            margin-bottom: 10px;
            padding-left: 12px;
        }

        /* TEXT */
        .card-service small {
            display: block;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 6px;
            padding-left: 12px;
            position: relative;
            transition: 0.3s;
        }

        /* DOT BULLET (BIAR HIDUP) */
        .card-service small::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 5px;
            height: 5px;
            background: var(--gold);
            border-radius: 50%;
        }

        .card-service small a {
            text-decoration: none;
            color: inherit;
        }

        /* HOVER HALUS */
        .card-service:hover small {
            color: #334155;
        }

        /* HOVER */
        .card-service:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(0,0,0,0.12);
        }
        /* BRAND */
        .brand-track {
            display: flex;
            gap: 60px;
            animation: scrollBrand 20s linear infinite;
        }
        .brand-track img {
            height: 60px;
            opacity: 0.6;
        }

        @keyframes scrollBrand {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        /* NEWS */
        .card-news {
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
        }
        .card-news:hover {
            transform: translateY(-6px);
        }

        /* FOOTER */
        footer {
            background: var(--dark);
            color: #fff;
            padding: 40px 0;
        }

        .row.g-4 > div {
            display: flex;
        }

        .card-service {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        /* IMAGE FIX */
        .card-service img {
            height: 220px;
            flex-shrink: 0;
        }

        /* BODY AUTO STRETCH */
        .card-service .card-body {
            flex-grow: 1;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-elegant">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/logo.png" alt="FS Group" class="logo-navbar">
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            ☰
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a href="#home" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">ABOUT</a></li>
                <li class="nav-item"><a href="#services" class="nav-link">SERVICES</a></li>
                <li class="nav-item"><a href="#brands" class="nav-link">BRAND</a></li>
                <li class="nav-item"><a href="#news" class="nav-link">NEWS</a></li>

            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero-carousel" id="home">

    <div id="heroSlider"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="4000"
         data-bs-pause="false">

        <!-- INDICATOR -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2"></button>
        </div>

        <!-- SLIDES -->
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: url('images/hero_landing/1.jpg');">
                    <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>PT. SETYAWAN EUNIKE GEMILANG</h1>
                        <p>Holding Company FS Group</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('images/hero_landing/2.jpg');">
                    <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Building Sustainable Business</h1>
                        <p>Across Multiple Industries</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('images/hero_landing/3.jpg');">
                    <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Innovation & Growth</h1>
                        <p>Driven by Excellence</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- ABOUT -->
<section class="section about" id="about">
    <div class="container">
        <div class="row align-items-center about-box">

            <div class="col-md-6">
                <div class="about-content">

                    <span class="about-label">About</span>

                    <h3 class="about-title">
                        Building a Sustainable Business Ecosystem
                    </h3>

                    <div class="about-divider"></div>

                    <p class="about-lead">
                        Berawal dari Natasha Skin Clinic Center, FS Group berkembang menjadi holding
                        yang mengelola berbagai sektor bisnis strategis.
                    </p>

                    <p class="about-desc">
                        Perkembangan bisnis yang semakin kompleks menuntut adanya struktur yang solid
                        untuk mengelola, mengembangkan, dan menyinergikan seluruh unit usaha dalam satu
                        visi besar yang berkelanjutan.
                    </p>

                </div>
            </div>

            <div class="col-md-6">
                <div class="about-image">
                    <img src="images/about_landing/about.jpg" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="section" id="services">
    <div class="container">

        <span class="section-label">Our Expertise</span>
        <h2 class="section-heading">
            Business Units That Drive Growth
        </h2>
        <hr>

        <div class="row g-4 justify-content-center">

            <!-- 1 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv1.jpg">

                        <div class="card-body">
                            <h5>COSMETIC FACTORY</h5>
                            <p>
                                <a href="http://www.dionfarmaabadi.com" target="_blank">PT. Dion Farma
                                    Abadi</a><br>
                                <a href="http://www.pesonabintangutama.com" target="_blank">PT. Pesona Bintang
                                    Utama </a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 2 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv2.jpg">
                        <div class="card-body">
                            <h5>PHARMACEUTICAL FACTORY</h5>
                            <p>
                                <a href="http://www.pesonabintangutama.com" target="_blank">PT. Pesona Bintang
                                    Utama </a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 3 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv4.jpg">
                        <div class="card-body">
                            <h5>OTC COSMETIC</h5>
                            <p>
                                <a href="http://www.natasha-skin.com" target="_blank">Natasha Skin Clinic
                                    Center </a><br>
                                <a href="http://www.naavagreen.com" target="_blank">Naavagreen Natural Skin
                                    Care </a><br>
                                <a href="http://www.aishaderm.co.id" target="_blank">Aishaderm</a><br>
                                <a href="http://www.hayyana.co.id" target="_blank">Hayyana</a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 4 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv3.jpg">
                        <div class="card-body">
                            <h5>RESTAURANT</h5>
                            <p>
                                <a href="http://www.madamtan.com/" target="_blank">Madam Tan</a><br>
                                <a href="https://www.instagram.com/saribundoyk/?hl=en" target="_blank">Sari
                                    Bundo Yogyakarta
                                </a><br>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 5 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv5.jpg">
                        <div class="card-body">
                            <h5>OFFICE SPACE LEASSER</h5>
                            <p>
                                <a href="http://www.bprnatasha.com" target="_blank">Bank Natasha Building</a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 6 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv6.jpg">
                        <div class="card-body">
                            <h5>TOUR & TRAVELS</h5>
                            <p>
                                <a href="https://www.instagram.com/grandbintangtour/" target="_blank">Grand
                                    Bintang</a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 7 -->
            <div class="col-lg-3 col-md-6">
                <a href="#" class="service-link">
                    <div class="card card-service">
                        <img src="images/services_landing/srv6.jpg">
                        <div class="card-body">
                            <h5>HOTEL & VILLA</h5>
                            <p>
                                <a href="https://www.astonhotelsinternational.com/id/hotel/view/43/grand-aston-yogyakarta" target="_blank">Hotel Grand Aston</a><br>
                                <a href="https://www.pophotels.com/POP!-Timoho" target="_blank">Hotel POP!
                                    Timoho</a><br>
                                <a href="http://www.villabianti.com/profile.html" target="_blank">Villa Bianti
                                    Bali</a><br>
                                <a href="http://www.villabianti.com/home" target="_blank">Bianti Private
                                    Residence Yogyakarta</a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>


        </div>

    </div>
</section>

<!-- BRANDS -->
<section class="section" id="brands">
    <div class="container">

        <div class="section-title">
            <h2>Our Brands</h2>
        </div>

        <div class="brand-slider">

            <div class="brand-track">
                <img src="images/brands/1.png">
                <img src="images/brands/2.png">
                <img src="images/brands/3.png">
                <img src="images/brands/4.png">
                <img src="images/brands/5.png">

                <!-- DUPLICATE untuk loop smooth -->
                <img src="images/brands/1.png">
                <img src="images/brands/2.png">
                <img src="images/brands/3.png">
                <img src="images/brands/4.png">
                <img src="images/brands/5.png">

            </div>

        </div>

    </div>
</section>

<!-- NEWS -->
<section class="section bg-light" id="news">
    <div class="container">

        <div class="section-title">
            <h2>Latest News</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card-news">
                    <img src="images/news/1.jpg">
                    <div class="p-3">
                        <h5>Natasha Raih Sertifikasi ISO</h5>
                        <p>Natasha Skin Clinic resmi mendapatkan ISO 9001:2015...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-news">
                    <img src="images/news/2.jpg">
                    <div class="p-3">
                        <h5>Penghargaan Internasional</h5>
                        <p>PT Dion Farma Abadi meraih penghargaan Eropa...</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-news">
                    <img src="images/news/3.jpg">
                    <div class="p-3">
                        <h5>Ekspansi Bisnis Baru</h5>
                        <p>FS Group memperluas lini bisnis di sektor hospitality...</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- VISI MISI -->
<section class="section dark-section">
    <div class="container">
        <h2>Vision & Mission</h2>
        <p>
            Menjadi group usaha terpercaya dengan pertumbuhan berkelanjutan
        </p>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container text-center">
        <p>© <?= date('Y') ?> FS Group</p>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
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
</script>

<script>
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
</script>
</body>
</html>