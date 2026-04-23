<?php
$title = "FS Group | PT. Setyawan Eunike Gemilang";
$baseUrl = Yii::app()->request->baseUrl;
$lang = Yii::app()->language ?: 'id';

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
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/landing.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top navbar-elegant">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/logo.png" alt="FS Group" class="logo-navbar">
        </a>

        <div class="d-flex align-items-center mobile-nav-actions">
            <div class="mobile-lang-switcher d-lg-none">
                <a href="<?php echo $this->createUrl('setLanguage', ['lang' => 'id']); ?>"
                   class="lang-switch <?php echo $lang === 'id' ? 'active' : ''; ?>"
                   title="Bahasa Indonesia">
                    <img src="<?php echo $baseUrl; ?>/images/flags/id.png" alt="ID" class="lang-flag">
                </a>

                <a href="<?php echo $this->createUrl('setLanguage', ['lang' => 'en']); ?>"
                   class="lang-switch <?php echo $lang === 'en' ? 'active' : ''; ?>"
                   title="English">
                    <img src="<?php echo $baseUrl; ?>/images/flags/en.png" alt="EN" class="lang-flag">
                </a>
            </div>

            <button
                    class="navbar-toggler"
                    type="button"
                    aria-controls="nav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                ☰
            </button>
        </div>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-center">
                <?php foreach ($this->menuItemsLanding as $item): ?>
                    <?php
                    $label = ($lang === 'id' && !empty($item->label_ind))
                        ? $item->label_ind
                        : $item->label;
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo CHtml::encode($item->url); ?>" class="nav-link">
                            <?php echo CHtml::encode(strtoupper($label)); ?>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li class="nav-item ms-lg-3 d-none d-lg-block">
                    <div class="d-flex align-items-center gap-2 lang-switcher">
                        <a href="<?php echo $this->createUrl('setLanguage', ['lang' => 'id']); ?>"
                           class="nav-link lang-switch <?php echo $lang === 'id' ? 'active' : ''; ?>"
                           title="Bahasa Indonesia">
                            <img src="<?php echo $baseUrl; ?>/images/flags/id.png" alt="ID" class="lang-flag">
                        </a>

                        <a href="<?php echo $this->createUrl('setLanguage', ['lang' => 'en']); ?>"
                           class="nav-link lang-switch <?php echo $lang === 'en' ? 'active' : ''; ?>"
                           title="English">
                            <img src="<?php echo $baseUrl; ?>/images/flags/en.png" alt="EN" class="lang-flag">
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- HERO -->
<section class="hero-carousel" id="home">
    <div id="heroSlider"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-pause="false">

        <?php if (!empty($this->heroLandingItems)): ?>
            <div class="carousel-indicators">
                <?php foreach ($this->heroLandingItems as $index => $item): ?>
                    <button
                            type="button"
                            data-bs-target="#heroSlider"
                            data-bs-slide-to="<?php echo $index; ?>"
                            class="<?php echo $index === 0 ? 'active' : ''; ?>"
                        <?php echo $index === 0 ? 'aria-current="true"' : ''; ?>>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="carousel-inner">
                <?php foreach ($this->heroLandingItems as $index => $item): ?>
                    <?php
                    $heroTitle = ($lang === 'id' && !empty($item->title_ind))
                        ? $item->title_ind
                        : $item->title;

                    $heroSubtitle = ($lang === 'id' && !empty($item->subtitle_ind))
                        ? $item->subtitle_ind
                        : $item->subtitle;

                    $heroImage = $baseUrl . '/images/hero_landing/' . $item->image;
                    ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="hero-slide" style="background-image: url('<?php echo CHtml::encode($heroImage); ?>');">
                            <div class="overlay"></div>
                            <div class="hero-content">
                                <h1><?php echo CHtml::encode($heroTitle); ?></h1>
                                <p><?php echo CHtml::encode($heroSubtitle); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
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
            </div>
        <?php endif; ?>
    </div>
</section>


<!-- ABOUT -->
<section class="section about about-fullbleed" id="about">
    <div class="container">
        <?php
        $aboutLabel = $lang === 'id' ? 'Tentang Kami' : 'About';
        $aboutTitle = '';
        $aboutLead = '';
        $aboutDesc = '';

        if ($this->aboutLandingContent) {
            $aboutLabel = ($lang === 'id' && !empty($this->aboutLandingContent->label_ind))
                ? $this->aboutLandingContent->label_ind
                : ($this->aboutLandingContent->label ?: $aboutLabel);

            $aboutTitle = ($lang === 'id' && !empty($this->aboutLandingContent->title_ind))
                ? $this->aboutLandingContent->title_ind
                : $this->aboutLandingContent->title;

            $aboutLead = ($lang === 'id' && !empty($this->aboutLandingContent->lead_ind))
                ? $this->aboutLandingContent->lead_ind
                : $this->aboutLandingContent->lead;

            $aboutDesc = ($lang === 'id' && !empty($this->aboutLandingContent->description_ind))
                ? $this->aboutLandingContent->description_ind
                : $this->aboutLandingContent->description;
        }

        $aboutMainImage = !empty($this->aboutLandingImages)
            ? $baseUrl . '/images/about_landing/' . $this->aboutLandingImages[0]->image
            : $baseUrl . '/images/about_landing/about.jpg';
        ?>

        <div class="about-bleed-wrap fade-up delay-1">
            <div class="about-bleed-visual">
                <img src="<?php echo CHtml::encode($aboutMainImage); ?>" alt="About Landing Main">
                <div class="about-bleed-overlay"></div>
            </div>

            <div class="about-bleed-content">
                <span class="about-label"><?php echo CHtml::encode($aboutLabel); ?></span>

                <h3 class="about-title">
                    <?php echo CHtml::encode($aboutTitle); ?>
                </h3>

                <div class="about-divider"></div>

                <p class="about-lead">
                    <?php echo CHtml::encode($aboutLead); ?>
                </p>

                <p class="about-desc">
                    <?php echo CHtml::encode($aboutDesc); ?>
                </p>
            </div>

            <?php if (!empty($this->aboutLandingImages) && count($this->aboutLandingImages) > 1): ?>
                <div class="about-bleed-thumbs fade-up delay-2">
                    <?php foreach ($this->aboutLandingImages as $index => $item): ?>
                        <?php if ($index === 0) continue; ?>
                        <?php if ($index > 3) break; ?>
                        <figure class="about-thumb">
                            <img
                                    src="<?php echo CHtml::encode($baseUrl . '/images/about_landing/' . $item->image); ?>"
                                    alt="About Landing <?php echo $index + 1; ?>">
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php if ($this->visionLanding): ?>
    <section class="section vision-luxury" id="vision">
        <div class="container">
            <?php
            $visionLabel = ($lang === 'id' && !empty($this->visionLanding->label_ind))
                ? $this->visionLanding->label_ind
                : $this->visionLanding->label;

            $visionHeading = ($lang === 'id' && !empty($this->visionLanding->heading_ind))
                ? $this->visionLanding->heading_ind
                : $this->visionLanding->heading;

            $visionTitle = ($lang === 'id' && !empty($this->visionLanding->title_ind))
                ? $this->visionLanding->title_ind
                : $this->visionLanding->title;

            $visionSub = ($lang === 'id' && !empty($this->visionLanding->subtitle_ind))
                ? $this->visionLanding->subtitle_ind
                : $this->visionLanding->subtitle;

            $visionImage = !empty($this->visionLanding->image)
                ? $baseUrl . '/images/vision_landing/' . $this->visionLanding->image
                : $baseUrl . '/images/vision_landing/visimisi.jpg';
            ?>

            <div class="vision-luxury-head section-title vision-animate">
                <span class="section-label"><?php echo CHtml::encode($visionLabel); ?></span>
                <h2 class="section-heading"><?php echo CHtml::encode($visionHeading); ?></h2>
            </div>

            <div class="vision-luxury-wrap" id="visionApple">
                <div class="vision-luxury-bg">
                    <img src="<?php echo CHtml::encode($visionImage); ?>" alt="Vision Mission">
                    <div class="vision-luxury-overlay"></div>
                </div>

                <div class="vision-luxury-content">
                    <span class="vision-label"><?php echo CHtml::encode($visionLabel); ?></span>

                    <h2 class="vision-title">
                        <?php echo nl2br(CHtml::encode($visionTitle)); ?>
                    </h2>

                    <p class="vision-sub">
                        <?php echo CHtml::encode($visionSub); ?>
                    </p>

                    <?php if (!empty($this->visionLandingItems)): ?>
                        <ul class="vision-points">
                            <?php foreach ($this->visionLandingItems as $item): ?>
                                <?php
                                $pointText = ($lang === 'id' && !empty($item->text_ind))
                                    ? $item->text_ind
                                    : $item->text;
                                ?>
                                <li><?php echo CHtml::encode($pointText); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


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

<!-- CAREER -->
<section class="section career-slider-section career-animate" id="career">

    <div class="container">

        <div class="section-title">
            <span class="section-label">Join Us</span>
            <h2 class="section-heading">Career Opportunities</h2>
        </div>

        <div class="career-slider">
            <button class="career-nav prev">&#10094;</button>
            <div class="career-track">

                <!-- ITEM -->
                <div class="career-item">
                    <img src="images/career_landing/career1.jpg">

                    <div class="career-overlay">
                        <h3>Beauty Therapis Perawat</h3>
                        <p>Full Time • Yogyakarta</p>

                        <a href="https://wa.me/628xxxx" target="_blank">
                            Apply Now
                        </a>
                    </div>
                </div>

                <div class="career-item">
                    <img src="images/career_landing/career2.jpg">

                    <div class="career-overlay">
                        <h3>Karyawan Produksi</h3>
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
                        <h3>Beauty Therapis Perawat</h3>
                        <p>Full Time • Yogyakarta</p>

                        <a href="https://wa.me/628xxxx" target="_blank">
                            Apply Now
                        </a>
                    </div>
                </div>

                <div class="career-item">
                    <img src="images/career_landing/career2.jpg">
                    <div class="career-overlay">
                        <h3>Karyawan Produksi</h3>
                        <p>Part Time • Yogyakarta</p>

                        <a href="https://wa.me/628xxxx" target="_blank">
                            Apply Now
                        </a>
                    </div>
                </div>

            </div>
            <button class="career-nav next">&#10095;</button>
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