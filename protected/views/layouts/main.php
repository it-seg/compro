<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    // LOAD OFFLINE ===========================
    $base = Yii::app()->baseUrl;

    // LIBRARY ONLINE ========================
    Yii::app()->clientScript->registerCssFile(
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
    );
    Yii::app()->clientScript->registerScriptFile(
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        CClientScript::POS_END
    );

    // font awesome
    Yii::app()->clientScript->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');

    // slider instagram
    Yii::app()->clientScript->registerCssFile('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    Yii::app()->clientScript->registerScriptFile('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', CClientScript::POS_END);


    ?>

    <style>
        :root{
            --navbar-bg: <?= CHtml::encode($this->navbar_bg); ?>;
            --navbar-bg-scroll: <?= CHtml::encode($this->navbar_bg_scroll); ?>;

            --about-bg-1: <?= CHtml::encode($this->about_bg_1); ?>;
            --about-bg-2: <?= CHtml::encode($this->about_bg_2); ?>;

            --space-bg-1: <?= CHtml::encode($this->space_bg_1); ?>;
            --space-bg-2: <?= CHtml::encode($this->space_bg_2); ?>;

            --menu-bg-1: <?= CHtml::encode($this->menu_bg_1); ?>;
            --menu-bg-2: <?= CHtml::encode($this->menu_bg_2); ?>;

            --event-bg-1: <?= CHtml::encode($this->event_bg_1); ?>;
            --event-bg-2: <?= CHtml::encode($this->event_bg_2); ?>;

            --news-bg-1: <?= CHtml::encode($this->news_bg_1); ?>;
            --news-bg-2: <?= CHtml::encode($this->news_bg_2); ?>;

            --contact-bg-1: <?= CHtml::encode($this->contact_bg_1); ?>;
            --contact-bg-2: <?= CHtml::encode($this->contact_bg_2); ?>;

            --footer-bg-1: <?= CHtml::encode($this->footer_bg_1); ?>;
            --footer-bg-2: <?= CHtml::encode($this->footer_bg_2); ?>;

            --gallery-bg-1: <?= CHtml::encode($this->gallery_bg_1); ?>;
            --gallery-bg-2: <?= CHtml::encode($this->gallery_bg_2); ?>;

            --music-bg-1: <?= CHtml::encode($this->music_bg_1); ?>;
            --music-bg-2: <?= CHtml::encode($this->music_bg_2); ?>;

            --carousel-color-title: <?= CHtml::encode($this->carousel_color_title); ?>;
            --carousel-color-sub-title: <?= CHtml::encode($this->carousel_color_sub_title); ?>;
            --color-button-view-menu: <?= CHtml::encode($this->color_button_view_menu); ?>;
            --color-button-make-reservation: <?= CHtml::encode($this->color_button_make_reservation); ?>;
            --color-background-running-text: <?= CHtml::encode($this->color_background_running_text); ?>;
        }
    </style>

</head>

<body>


<!-- BACK TO TOP -->
<button id="backToTop" class="back-to-top" aria-label="Back to top">
    <svg class="arrow-svg" viewBox="0 0 100 100">
        <circle class="progress-ring" cx="50" cy="50" r="45"></circle>
        <polyline class="arrow-icon" points="30,55 50,35 70,55"></polyline>
    </svg>
</button>

<?php $this->renderPartial('//layouts/_navbar'); ?>
<!-- CONTENT -->
<main class="page-content">
    <?php echo $content; ?>
</main>

<?php $this->renderPartial('//layouts/_contact'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>

<?php $this->renderPartial('//layouts/_debug_script'); ?>

<!-- WHATSAPP FLOAT -->
<a href="https://wa.me/6281329403145"
   class="wa-float"
   target="_blank"
   aria-label="Chat WhatsApp">

    <svg viewBox="0 0 32 32" class="wa-icon">
        <path d="M16 .3C7.3.3.3 7.3.3 16
        c0 2.8.7 5.5 2.2 7.9L0
        32l8.4-2.2c2.3
        1.3 4.9 2
        7.6 2
        8.7 0
        15.7-7
        15.7-15.7
        C31.7
        7.3 24.7
        .3 16
        .3z"/>
    </svg>
</a>

</body>
