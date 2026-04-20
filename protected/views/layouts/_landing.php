<?php
$title = "FS Group | PT. Setyawan Eunike Gemilang";
$baseUrl = Yii::app()->request->baseUrl;

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
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/landing.css">
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

            <div class="col-md-6 fade-up delay-1">
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

            <div class="col-md-6 fade-up delay-2">
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

        <span class="section-label fade-up delay-1">Our Expertise</span>

        <h2 class="section-heading fade-up delay-2">
            Business Units That Drive Growth
        </h2>

        <hr class="fade-up delay-3">

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

        <hr class="fade-up delay-3">

    </div>
</section>

<!-- BRANDS -->
<section class="section brand-elegant" id="brands">
    <div class="container">

        <div class="section-title fade-up">
            <span class="section-label">Our Network</span>
            <h2 class="section-heading">Our Brands</h2>
        </div>

        <div class="brand-slider">
            <!-- BUTTON PRE -->
            <button class="brand-nav prev">&#10094;</button>
            <div class="brand-track">

                <a href="https://www.pesonajayasukses.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/pjs.png">
                </a>
                <a href="http://www.madamtan.com/" target="_blank" class="brand-item">
                    <img src="images/brand_landing/madamtan.png">
                </a>
                <a href="https://www.pophotels.com/" target="_blank" class="brand-item">
                    <img src="images/brand_landing/pop.png">
                </a>
                <a href="http://www.pesonabintangutama.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/pbu.png">
                </a>
                <a href="http://www.naavagreen.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/naava.png">
                </a>
                <a href="http://www.natasha-skin.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/natasha.png">
                </a>
                <a href="#" class="brand-item">
                    <img src="images/brand_landing/osmile.png">
                </a>
                <a href="#" class="brand-item">
                    <img src="images/brand_landing/gbu.png">
                </a>
                <a href="#" class="brand-item">
                    <img src="images/brand_landing/bank.png">
                </a>
                <a href="http://www.dionfarmaabadi.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/dfa.png">
                </a>
                <a href="http://www.hayyana.co.id" target="_blank" class="brand-item">
                    <img src="images/brand_landing/hayyana.png">
                </a>

                <!-- DUPLICATE WAJIB -->
                <a href="https://www.pesonajayasukses.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/pjs.png">
                </a>
                <a href="http://www.madamtan.com/" target="_blank" class="brand-item">
                    <img src="images/brand_landing/madamtan.png">
                </a>
                <a href="https://www.pophotels.com/" target="_blank" class="brand-item">
                    <img src="images/brand_landing/pop.png">
                </a>
                <a href="http://www.pesonabintangutama.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/pbu.png">
                </a>
                <a href="http://www.naavagreen.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/naava.png">
                </a>
                <a href="http://www.natasha-skin.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/natasha.png">
                </a>
                <a href="#" class="brand-item">
                    <img src="images/brand_landing/osmile.png">
                </a>
                <a href="#" class="brand-item">
                    <img src="images/brand_landing/gbu.png">
                </a>
                <a href="#" class="brand-item">
                    <img src="images/brand_landing/bank.png">
                </a>
                <a href="http://www.dionfarmaabadi.com" target="_blank" class="brand-item">
                    <img src="images/brand_landing/dfa.png">
                </a>
                <a href="http://www.hayyana.co.id" target="_blank" class="brand-item">
                    <img src="images/brand_landing/hayyana.png">
                </a>

            </div>
            <!-- BUTTON NEXT -->
            <button class="brand-nav next">&#10095;</button>
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

            <div class="col-md-6 news-animate">
                <div class="card-news">
                    <img src="images/news_landing/news1.png">
                    <div class="p-3">
                        <h5>Natasha Raih Sertifikasi ISO</h5>
                        <p>Natasha Skin Clinic resmi mendapatkan ISO 9001:2015...</p>
                        <button
                                class="btn-readmore"
                                data-title="Natasha Raih Sertifikasi ISO"
                                data-desc="Natasha Skin Clinic resmi mendapatkan ISO 9001:2015 sebagai bentuk komitmen terhadap kualitas pelayanan dan standar internasional."
                                data-img="images/news_landing/news1.png"
                        >
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 news-animate" >
                <div class="card-news">
                    <img src="images/news_landing/news2.jpg">
                    <div class="p-3">
                        <h5>Penghargaan Internasional</h5>
                        <p>PT Dion Farma Abadi meraih penghargaan Eropa...</p>
                        <button
                                class="btn-readmore"
                                data-title="Penghargaan Internasional"
                                data-desc="Pada tanggal 12 Mei 2018,  PT DION FARMA ABADI  menerima penghargaan  European Award for Best Pratices 2018 diwakili oleh Bapak Jonatan Dion Setyawan selaku komisaris.  European Society for Quality Research (ESQR) ini diadakan di Brussel, Belgia. European Award for Best Practices sendiri diberikan kepada  perusahaan yang dinilai secara comprehensive telah mengimplementasikan dan berusaha keras dalam penerapan manajemen mutu perusahaan.
                                ESQR (European Society for Quality Research) yang bertempat di Switzerland sebagai penyelenggara telah melakukan seleksi ketat ke berbagai Negara, untuk menemukan perusahaan-perusahaan yang berkomitmen dan terus berinovasi untuk meningkatkan kualitas dari Manajemen Perusahaan tersebut, dan salah satu dari sekitar 78 perusahaan yang terpilih adalah PT. Dion Farma Abadi."
                                data-img="images/news_landing/news2.jpg"
                        >
                            Read More
                        </button>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>

<!-- VISI MISI -->
<section class="section vision-section" id="vision">
    <div class="container">

        <div class="section-title vision-animate">
            <span class="section-label">Our Direction</span>
            <h2 class="section-heading">Vision & Mission</h2>
        </div>

        <div class="vision-wrapper">

            <!-- VISI -->
            <div class="vision-card vision-animate delay-1">
                <h3>Our Vision</h3>
                <p>
                    Menjadi perusahaan terintegrasi yang unggul dalam berbagai sektor industri,
                    dengan fokus pada inovasi, kualitas, dan keberlanjutan.
                </p>
            </div>

            <!-- MISI -->
            <div class="vision-card vision-animate delay-2">
                <h3>Our Mission</h3>
                <ul>
                    <li>Menyediakan produk dan layanan berkualitas tinggi</li>
                    <li>Mengembangkan sumber daya manusia yang profesional</li>
                    <li>Mendorong inovasi berkelanjutan</li>
                    <li>Membangun hubungan jangka panjang dengan mitra</li>
                </ul>
            </div>

        </div>

    </div>
</section>

<!-- CAREER -->
<section class="section career-slider-section" id="career">

    <div class="container">

        <div class="section-title">
            <span class="section-label">Join Us</span>
            <h2 class="section-heading">Career Opportunities</h2>
        </div>

        <div class="career-slider">

            <div class="career-track">

                <!-- ITEM -->
                <div class="career-item">
                    <img src="images/career_landing/career1.jpg">

                    <div class="career-overlay">
                        <h3>Crew Store</h3>
                        <p>Full Time • Yogyakarta</p>

                        <a href="https://wa.me/628xxxx" target="_blank">
                            Apply Now
                        </a>
                    </div>
                </div>

                <div class="career-item">
                    <img src="images/career_landing/career2.jpg">

                    <div class="career-overlay">
                        <h3>Crew Store</h3>
                        <p>Part Time • Yogyakarta</p>

                        <a href="https://wa.me/628xxxx" target="_blank">
                            Apply Now
                        </a>
                    </div>
                </div>

                <!-- DUPLICATE UNTUK LOOP -->
                <div class="career-item">
                    <img src="images/career_landing/career1.jpg">
                    <div class="career-overlay">
                        <h3>Crew Store</h3>
                        <p>Full Time • Yogyakarta</p>
                        <a href="#">Apply Now</a>
                    </div>
                </div>

                <div class="career-item">
                    <img src="images/career_landing/career2.jpg">
                    <div class="career-overlay">
                        <h3>Crew Store</h3>
                        <p>Part Time • Yogyakarta</p>
                        <a href="#">Apply Now</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- FOOTER -->
<footer class="footer-luxury footer-animate">

    <div class="container">

        <div class="footer-top">

            <!-- BRAND -->
            <div class="footer-col brand">
                <img src="images/logo.png" class="footer-logo">

                <p class="footer-address">
                    Jl. Urip Sumoharjo No.69 A<br>
                    Klitren, Gondokusuman, Kota Yogyakarta<br>
                    Daerah Istimewa Yogyakarta 55222<br><br>
                    (0274) 586877
                </p>

                <div class="footer-map">
                    <iframe
                            src="https://www.google.com/maps?q=Jl.%20Urip%20Sumoharjo%20No.69%20A%20Yogyakarta&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- COMPANY -->
            <div class="footer-col">
                <h6>Company</h6>
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="https://job-like.com/joblist/company/383696/" target="_blank">Career</a></li>
                </ul>
            </div>

        </div>

        <!-- DIVIDER -->
        <div class="footer-divider"></div>

        <!-- BOTTOM -->
        <div class="footer-bottom">
            <p>
                © <script>document.write(new Date().getFullYear());</script>
                PT. Setyawan Eunike Gemilang — All Rights Reserved
            </p>
        </div>

    </div>

</footer>


<!-- NEWS MODAL -->
<div class="modal fade modal-news" id="newsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- CLOSE -->
            <button type="button" class="modal-close" data-bs-dismiss="modal">
                ✕
            </button>

            <!-- IMAGE -->
            <div class="modal-image-wrapper">
                <img id="modalImage">
            </div>

            <!-- CONTENT -->
            <div class="modal-body">

                <div class="modal-content-inner">
                    <span class="modal-label">NEWS UPDATE</span>
                    <h3 id="modalTitle"></h3>
                    <p id="modalDesc"></p>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $baseUrl ?>/js/landing.js"></script>


</body>
</html>