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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
<?php if ($this->servicesLanding): ?>
    <section class="section services-luxury" id="services">
        <div class="container">
            <?php
            $servicesLabel = ($lang === 'id' && !empty($this->servicesLanding->label_ind))
                ? $this->servicesLanding->label_ind
                : $this->servicesLanding->label;

            $servicesTitle = ($lang === 'id' && !empty($this->servicesLanding->title_ind))
                ? $this->servicesLanding->title_ind
                : $this->servicesLanding->title;
            ?>

            <div class="section-title fade-up delay-1">
                <span class="section-label"><?php echo CHtml::encode($servicesLabel); ?></span>
                <h2 class="section-heading"><?php echo CHtml::encode($servicesTitle); ?></h2>
            </div>

            <hr class="fade-up delay-2">

            <div class="row g-4 justify-content-center">
                <?php foreach ($this->servicesLandingItems as $index => $item): ?>
                    <?php
                    $itemTitle = ($lang === 'id' && !empty($item->title_ind))
                        ? $item->title_ind
                        : $item->title;

                    $itemImage = !empty($item->image)
                        ? $baseUrl . '/images/services_landing/' . $item->image
                        : $baseUrl . '/images/services_landing/srv1.jpg';

                    $links = isset($this->servicesLandingLinks[$item->id])
                        ? $this->servicesLandingLinks[$item->id]
                        : [];

                    $layoutClass = 'service-layout-default';

                    if ($index === 0) {
                        $layoutClass = 'service-layout-featured';
                    } elseif (in_array($index, [1, 2], true)) {
                        $layoutClass = 'service-layout-tall';
                    }
                    ?>
                    <div class="col-lg-3 col-md-6 fade-up service-col <?php echo $layoutClass; ?>">
                        <article class="card card-service service-card-luxury">
                            <div class="service-card-media">
                                <img src="<?php echo CHtml::encode($itemImage); ?>" alt="<?php echo CHtml::encode($itemTitle); ?>">
                                <div class="service-card-overlay"></div>
                            </div>

                            <div class="card-body">
                                <h5><?php echo CHtml::encode(strtoupper($itemTitle)); ?></h5>

                                <?php if (!empty($links)): ?>
                                    <div class="service-lines">
                                        <?php foreach ($links as $link): ?>
                                            <?php
                                            $linkLabel = ($lang === 'id' && !empty($link->label_ind))
                                                ? $link->label_ind
                                                : $link->label;
                                            ?>
                                            <a
                                                    href="<?php echo CHtml::encode($link->url); ?>"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="service-line-link">
                                                <span class="service-line"><?php echo CHtml::encode($linkLabel); ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>

            </div>

            <hr class="fade-up delay-3">
        </div>
    </section>
<?php endif; ?>


<!-- BRANDS -->
<?php if ($this->brandsLanding): ?>
    <section class="section brands-premium" id="brands">
        <div class="container">
            <?php
            $brandsLabel = ($lang === 'id' && !empty($this->brandsLanding->label_ind))
                ? $this->brandsLanding->label_ind
                : $this->brandsLanding->label;

            $brandsTitle = ($lang === 'id' && !empty($this->brandsLanding->title_ind))
                ? $this->brandsLanding->title_ind
                : $this->brandsLanding->title;

            $brandsSubtitle = ($lang === 'id' && !empty($this->brandsLanding->subtitle_ind))
                ? $this->brandsLanding->subtitle_ind
                : $this->brandsLanding->subtitle;
            ?>

            <div class="brands-premium-head section-title fade-up">
                <span class="section-label"><?php echo CHtml::encode($brandsLabel); ?></span>
                <h2 class="section-heading"><?php echo CHtml::encode($brandsTitle); ?></h2>
                <?php if (!empty($brandsSubtitle)): ?>
                    <p class="brands-premium-subtitle"><?php echo CHtml::encode($brandsSubtitle); ?></p>
                <?php endif; ?>
            </div>

            <div class="brands-premium-grid">
                <?php foreach ($this->brandsLandingItems as $index => $item): ?>
                    <?php
                    $brandName = ($lang === 'id' && !empty($item->name_ind))
                        ? $item->name_ind
                        : $item->name;

                    $brandSubtitle = ($lang === 'id' && !empty($item->subtitle_ind))
                        ? $item->subtitle_ind
                        : $item->subtitle;

                    $brandImage = !empty($item->image)
                        ? $baseUrl . '/images/brand_landing/' . $item->image
                        : $baseUrl . '/images/brand_landing/pjs.png';

                    $brandUrl = !empty($item->url) ? $item->url : '#';
                    ?>
                    <a
                            href="<?php echo CHtml::encode($brandUrl); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="brand-premium-tile fade-up">
                        <div class="brand-premium-logo-wrap">
                            <img src="<?php echo CHtml::encode($brandImage); ?>" alt="<?php echo CHtml::encode($brandName); ?>" class="brand-premium-logo">
                        </div>

                        <div class="brand-premium-copy">
                            <h3><?php echo CHtml::encode($brandName); ?></h3>
                            <?php if (!empty($brandSubtitle)): ?>
                                <p><?php echo CHtml::encode($brandSubtitle); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- NEWS -->
<?php if ($this->newsLanding): ?>
    <section class="section news-luxury" id="news">
    <div class="container">
            <?php
            $newsLabel = ($lang === 'id' && !empty($this->newsLanding->label_ind))
                ? $this->newsLanding->label_ind
                : $this->newsLanding->label;

            $newsTitle = ($lang === 'id' && !empty($this->newsLanding->title_ind))
                ? $this->newsLanding->title_ind
                : $this->newsLanding->title;

            $readMoreText = $lang === 'id' ? 'Baca Selengkapnya' : 'Read More';
            ?>

            <div class="section-title fade-up">
                <span class="section-label"><?php echo CHtml::encode($newsLabel); ?></span>
                <h2 class="section-heading"><?php echo CHtml::encode($newsTitle); ?></h2>
            </div>

            <div class="row g-4">
                <?php foreach ($this->newsLandingItems as $item): ?>
                    <?php
                    $itemTitle = ($lang === 'id' && !empty($item->title_ind))
                        ? $item->title_ind
                        : $item->title;

                    $itemExcerpt = ($lang === 'id' && !empty($item->excerpt_ind))
                        ? $item->excerpt_ind
                        : $item->excerpt;

                    $itemContent = ($lang === 'id' && !empty($item->content_ind))
                        ? $item->content_ind
                        : $item->content;

                    $itemImage = !empty($item->image)
                        ? $baseUrl . '/images/news_landing/' . $item->image
                        : $baseUrl . '/images/news_landing/news1.png';
                    ?>
                    <div class="col-md-6 news-animate">
                        <article class="card-news news-card-luxury">
                            <div class="news-card-media">
                                <img src="<?php echo CHtml::encode($itemImage); ?>" alt="<?php echo CHtml::encode($itemTitle); ?>">
                            </div>

                            <div class="news-card-body">
                                <h5><?php echo CHtml::encode($itemTitle); ?></h5>
                                <p><?php echo CHtml::encode($itemExcerpt); ?></p>

                                <button
                                        class="btn-readmore"
                                        data-title="<?php echo CHtml::encode($itemTitle); ?>"
                                        data-desc="<?php echo CHtml::encode($itemContent); ?>"
                                        data-img="<?php echo CHtml::encode($itemImage); ?>">
                                    <?php echo CHtml::encode($readMoreText); ?>
                                </button>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- CAREER -->
<?php if ($this->careerLanding): ?>
    <section class="section career-slider-section career-animate" id="career">
        <div class="container">
            <?php
            $careerLabel = ($lang === 'id' && !empty($this->careerLanding->label_ind))
                ? $this->careerLanding->label_ind
                : $this->careerLanding->label;

            $careerTitle = ($lang === 'id' && !empty($this->careerLanding->title_ind))
                ? $this->careerLanding->title_ind
                : $this->careerLanding->title;
            ?>

            <div class="section-title">
                <span class="section-label"><?php echo CHtml::encode($careerLabel); ?></span>
                <h2 class="section-heading"><?php echo CHtml::encode($careerTitle); ?></h2>
            </div>

            <div class="career-slider">
                <button class="career-nav prev">&#10094;</button>
                <div class="career-track">
                    <?php foreach ($this->careerLandingItems as $item): ?>
                        <?php
                        $careerItemTitle = ($lang === 'id' && !empty($item->title_ind))
                            ? $item->title_ind
                            : $item->title;

                        $careerJobType = ($lang === 'id' && !empty($item->job_type_ind))
                            ? $item->job_type_ind
                            : $item->job_type;

                        $careerLocation = ($lang === 'id' && !empty($item->location_ind))
                            ? $item->location_ind
                            : $item->location;

                        $careerButton = ($lang === 'id' && !empty($item->button_label_ind))
                            ? $item->button_label_ind
                            : $item->button_label;

                        $careerImage = !empty($item->image)
                            ? $baseUrl . '/images/career_landing/' . $item->image
                            : $baseUrl . '/images/career_landing/career1.jpg';
                        ?>
                        <div class="career-item">
                            <img src="<?php echo CHtml::encode($careerImage); ?>" alt="<?php echo CHtml::encode($careerItemTitle); ?>">

                            <div class="career-overlay">
                                <h3><?php echo CHtml::encode($careerItemTitle); ?></h3>
                                <p><?php echo CHtml::encode(trim($careerJobType . ' • ' . $careerLocation)); ?></p>

                                <a href="<?php echo CHtml::encode($item->apply_url); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php echo CHtml::encode($careerButton ?: ($lang === 'id' ? 'Lamar Sekarang' : 'Apply Now')); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php foreach ($this->careerLandingItems as $item): ?>
                        <?php
                        $careerItemTitle = ($lang === 'id' && !empty($item->title_ind))
                            ? $item->title_ind
                            : $item->title;

                        $careerJobType = ($lang === 'id' && !empty($item->job_type_ind))
                            ? $item->job_type_ind
                            : $item->job_type;

                        $careerLocation = ($lang === 'id' && !empty($item->location_ind))
                            ? $item->location_ind
                            : $item->location;

                        $careerButton = ($lang === 'id' && !empty($item->button_label_ind))
                            ? $item->button_label_ind
                            : $item->button_label;

                        $careerImage = !empty($item->image)
                            ? $baseUrl . '/images/career_landing/' . $item->image
                            : $baseUrl . '/images/career_landing/career1.jpg';
                        ?>
                        <div class="career-item">
                            <img src="<?php echo CHtml::encode($careerImage); ?>" alt="<?php echo CHtml::encode($careerItemTitle); ?>">

                            <div class="career-overlay">
                                <h3><?php echo CHtml::encode($careerItemTitle); ?></h3>
                                <p><?php echo CHtml::encode(trim($careerJobType . ' • ' . $careerLocation)); ?></p>

                                <a href="<?php echo CHtml::encode($item->apply_url); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php echo CHtml::encode($careerButton ?: ($lang === 'id' ? 'Lamar Sekarang' : 'Apply Now')); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="career-nav next">&#10095;</button>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- FOOTER -->
<?php if ($this->footerLanding): ?>
    <footer class="footer-clean footer-animate">
        <div class="container">
            <?php
            $footerAddress = ($lang === 'id' && !empty($this->footerLanding->address_ind))
                ? $this->footerLanding->address_ind
                : $this->footerLanding->address;

            $footerPhone = ($lang === 'id' && !empty($this->footerLanding->phone_ind))
                ? $this->footerLanding->phone_ind
                : $this->footerLanding->phone;

            $footerCopyright = ($lang === 'id' && !empty($this->footerLanding->copyright_text_ind))
                ? $this->footerLanding->copyright_text_ind
                : $this->footerLanding->copyright_text;

            $socialTitle = ($lang === 'id' && !empty($this->footerLanding->social_title_ind))
                ? $this->footerLanding->social_title_ind
                : $this->footerLanding->social_title;

            $companyName = 'PT. Setyawan Eunike Gemilang';
            $menuTitle = $lang === 'id' ? 'Navigasi' : 'Navigation';
            $contactTitle = $lang === 'id' ? 'Kontak' : 'Contact';
            $followTitle = $socialTitle ?: ($lang === 'id' ? 'Ikuti Kami' : 'Follow Us');
            ?>

            <div class="footer-clean-top">
                <div class="footer-clean-brand">
                    <img src="images/logo.png" class="footer-clean-logo" alt="<?php echo CHtml::encode($companyName); ?>">

                    <h3><?php echo CHtml::encode($companyName); ?></h3>

                    <div class="footer-clean-info">
                        <div class="footer-clean-info-item">
                            <i class="bi bi-geo-alt"></i>
                            <span><?php echo nl2br(CHtml::encode(str_replace('<br>', "\n", (string)$footerAddress))); ?></span>
                        </div>

                        <div class="footer-clean-info-item">
                            <i class="bi bi-telephone"></i>
                            <span><?php echo CHtml::encode((string)$footerPhone); ?></span>
                        </div>
                    </div>
                </div>

                <div class="footer-clean-nav">
                    <h6><?php echo CHtml::encode($menuTitle); ?></h6>

                    <div class="footer-clean-links">
                        <?php foreach ($this->menuItemsLanding as $item): ?>
                            <?php
                            $footerMenuLabel = ($lang === 'id' && !empty($item->label_ind))
                                ? $item->label_ind
                                : $item->label;
                            ?>
                            <a href="<?php echo CHtml::encode($item->url); ?>">
                                <?php echo CHtml::encode($footerMenuLabel); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="footer-clean-contact">
                    <h6><?php echo CHtml::encode($followTitle); ?></h6>

                    <div class="footer-clean-social">
                        <?php if (!empty($this->footerLanding->instagram_url)): ?>
                            <a href="<?php echo CHtml::encode($this->footerLanding->instagram_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($this->footerLanding->facebook_url)): ?>
                            <a href="<?php echo CHtml::encode($this->footerLanding->facebook_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($this->footerLanding->tiktok_url)): ?>
                            <a href="<?php echo CHtml::encode($this->footerLanding->tiktok_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($this->footerLanding->youtube_url)): ?>
                            <a href="<?php echo CHtml::encode($this->footerLanding->youtube_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                <i class="bi bi-youtube"></i>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($this->footerLanding->map_embed)): ?>
                        <div class="footer-clean-map">
                            <iframe
                                    src="<?php echo CHtml::encode($this->footerLanding->map_embed); ?>"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-clean-bottom">
                <p>
                    © <script>document.write(new Date().getFullYear());</script>
                    <?php echo CHtml::encode($companyName); ?> — <?php echo CHtml::encode((string)$footerCopyright); ?>
                </p>
            </div>
        </div>
    </footer>
<?php endif; ?>


<!-- NEWS MODAL -->
<div class="modal fade modal-news" id="newsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="modal-close" data-bs-dismiss="modal">✕</button>

            <div class="modal-image-wrapper">
                <img id="modalImage">
            </div>

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
<script src="<?= $baseUrl ?>/js/landing.js"></script>


</body>
</html>