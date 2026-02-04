<?php
$baseUrl = Yii::app()->baseUrl;
$folder  = Yii::getPathOfAlias('webroot') . '/images/spaces/' . $space['folder'];
$images  = [];

if (is_dir($folder)) {
    $files = glob($folder . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);
    sort($files);
    foreach ($files as $f) {
        $images[] = $baseUrl . '/images/spaces/' . $space['folder'] . '/' . basename($f);
    }
}
?>

<section class="space-detail-page">

    <div class="space-detail-header">
        <h1><?= CHtml::encode($space['title']); ?></h1>

        <div class="space-desc">
            <?= $space['desc']; ?>
        </div>


        <a href="https://wa.me/<?= $this->whatsApp_number ?>
?text=<?= urlencode(
            'Halo, saya ingin reservasi untuk ' . $space['title'] . '.'
        ); ?>"
           class="space-reserve-btn"
           target="_blank">
            <?= CHtml::encode($this->space_reserver_button); ?>
        </a>
    </div>

    <?php if (count($images) >= 3): ?>

        <div class="space-split-layout">

            <div class="space-split-hero">
                <img src="<?= $images[0]; ?>" alt="">
            </div>

            <div class="space-split-side">
                <div class="space-split-img">
                    <img src="<?= $images[1]; ?>" alt="">
                </div>
                <div class="space-split-img">
                    <img src="<?= $images[2]; ?>" alt="">
                </div>
            </div>

        </div>

        <?php if (count($images) > 3): ?>
            <div class="space-more-gallery">
                <?php foreach (array_slice($images, 3) as $img): ?>
                    <div class="space-more-item">
                        <img src="<?= $img; ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</section>

<!-- IMAGE POPUP -->
<div class="image-popup" id="imagePopup">
    <button class="popup-nav prev">&#10094;</button>

    <img id="popupImage" src="" alt="">

    <button class="popup-nav next">&#10095;</button>
    <span class="popup-close">&times;</span>
</div>


<!-- SPACE SECTION (OTHER SPACES / CTA) -->
<?php $this->renderPartial('//layouts/_space'); ?>
