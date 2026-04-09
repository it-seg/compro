<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/hero.css'
);

$headerMedia = $this->getHeaderMedia();
$heroTypeSetting = $this->getSetting('hero_type', 'image');
$interval = intval($this->getSetting('hero_interval', 5000));

$images = array_values(array_map(function ($m) {
    return $m['url'];
}, array_filter($headerMedia, function ($m) {
    return $m['type'] === 'image';
})));


$videos = array_values(array_map(function ($m) {
    return $m['url'];
}, array_filter($headerMedia, function ($m) {
    return $m['type'] === 'video';
})));


$firstImage = isset($images[0])
    ? $images[0]
    : Yii::app()->baseUrl . '/images/header/main.jpg';

$waText = urlencode("Halo, saya ingin reservasi meja");
$waLink = "https://wa.me/" . $this->whatsApp_number . "?text={$waText}";
?>

<div class="hero-wrap">

    <?php if ($heroTypeSetting === 'video' && count($videos) > 0): ?>

        <video id="heroVideo"
               class="hero-media"
               autoplay
               muted
               loop
               playsinline>
            <source src="<?php echo $videos[0]; ?>" type="video/mp4">
        </video>

        <div class="hero-overlay">
            <div class="hero-content">

                <h1 class="hero-title neon-title">
                    <?php echo CHtml::encode($this->header); ?>
                </h1>

                <p class="hero-sub neon-sub">
                    <?php echo CHtml::encode($this->sub_header); ?>
                </p>

                <div class="hero-cta-group">

                    <?php if (!empty($this->view_menus) || !empty($this->sub_view_menus)): ?>
                        <a href="<?php echo Yii::app()->createUrl('site/menu'); ?>"
                           class="hero-cta">

                            <?php if (!empty($this->view_menus)): ?>
                                <span class="cta-main">
                <?php echo CHtml::encode($this->view_menus); ?>
            </span>
                            <?php endif; ?>

                            <?php if (!empty($this->sub_view_menus)): ?>
                                <span class="cta-sub">
                <?php echo CHtml::encode($this->sub_view_menus); ?>
            </span>
                            <?php endif; ?>

                        </a>
                    <?php endif; ?>


                    <?php if (!empty($this->hero_reservation) || !empty($this->sub_hero_reservation)): ?>
                        <a href="<?php echo $waLink; ?>"
                           class="hero-cta hero-cta-secondary"
                           target="_blank">

                            <?php if (!empty($this->hero_reservation)): ?>
                                <span class="cta-main">
                <?php echo CHtml::encode($this->hero_reservation); ?>
            </span>
                            <?php endif; ?>

                            <?php if (!empty($this->sub_hero_reservation)): ?>
                                <span class="cta-sub">
                <?php echo CHtml::encode($this->sub_hero_reservation); ?>
            </span>
                            <?php endif; ?>

                        </a>
                    <?php endif; ?>

                </div>

            </div>
        </div>

    <?php else: ?>

        <div class="hero-rotator">

            <img id="heroImgA"
                 class="hero-media hero-visible"
                 src="<?php echo CHtml::encode($firstImage); ?>"
                 alt="Hero Image A">

            <img id="heroImgB"
                 class="hero-media hero-hidden"
                 src="<?php echo CHtml::encode($firstImage); ?>"
                 alt="Hero Image B">

            <div class="hero-overlay">
                <div class="hero-content">

                    <h1 class="hero-title neon-title">
                        <?php echo CHtml::encode($this->header); ?>
                    </h1>

                    <p class="hero-sub neon-sub">
                        <?php echo CHtml::encode($this->sub_header); ?>
                    </p>


                    <div class="hero-cta-group">

                        <?php if (!empty($this->view_menus) || !empty($this->sub_view_menus)): ?>
                            <a href="<?php echo Yii::app()->createUrl('site/menu'); ?>"
                               class="hero-cta">

                                <?php if (!empty($this->view_menus)): ?>
                                    <span class="cta-main">
                    <?php echo CHtml::encode($this->view_menus); ?>
                </span>
                                <?php endif; ?>

                                <?php if (!empty($this->sub_view_menus)): ?>
                                    <span class="cta-sub">
                    <?php echo CHtml::encode($this->sub_view_menus); ?>
                </span>
                                <?php endif; ?>

                            </a>
                        <?php endif; ?>


                        <?php if (!empty($this->hero_reservation) || !empty($this->sub_hero_reservation)): ?>
                            <a href="<?php echo $waLink; ?>"
                               class="hero-cta hero-cta-secondary"
                               target="_blank">

                                <?php if (!empty($this->hero_reservation)): ?>
                                    <span class="cta-main">
                    <?php echo CHtml::encode($this->hero_reservation); ?>
                </span>
                                <?php endif; ?>

                                <?php if (!empty($this->sub_hero_reservation)): ?>
                                    <span class="cta-sub">
                    <?php echo CHtml::encode($this->sub_hero_reservation); ?>
                </span>
                                <?php endif; ?>

                            </a>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        </div>

    <?php endif; ?>

</div>


<?php
$jsImages = json_encode($images);
$jsInterval = max(2000, $interval);
?>

<script>
    (function () {

        const images = <?php echo $jsImages ?>;
        if (!images.length) return;

        const A = document.getElementById('heroImgA');
        const B = document.getElementById('heroImgB');

        let showA = true;
        let index = 0;

        images.forEach(src => {
            const img = new Image();
            img.src = src;
        });

        setInterval(() => {

            index = (index + 1) % images.length;
            const next = images[index];

            const fadeIn = showA ? B : A;
            const fadeOut = showA ? A : B;

            fadeIn.src = next;

            fadeIn.classList.remove('hero-hidden');
            fadeIn.classList.add('hero-visible');

            fadeOut.classList.remove('hero-visible');
            fadeOut.classList.add('hero-hidden');

            showA = !showA;

        }, <?php echo $jsInterval ?>);

    })();
</script>
