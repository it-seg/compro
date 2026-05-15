<?php
$this->pageTitle = '';
$images = $this->getAboutImages();

$heroImage = null;
$galleryImages = [];

foreach ($images as $img) {
    if (stripos(basename($img), 'cover') !== false) {
        $heroImage = $img;
    } else {
        $galleryImages[] = $img;
    }
}

?>

<section class="about-page">

    <!-- HERO IMAGE -->
    <?php if ($heroImage): ?>
        <section class="about-hero-full">
            <img src="<?= $heroImage; ?>" alt="Tip Tap Toe">
            <div class="about-hero-overlay">
                <h1><?= CHtml::encode($this->about_title); ?></h1>
                <p><?= CHtml::encode($this->about_sub_title); ?></p>
            </div>
        </section>
    <?php endif; ?>

    <!-- STORY -->
    <section class="about-story">
        <div class="about-story-inner">
            <p class="lead">
                <?= CHtml::decode($this->about_value_p1); ?>
            </p>

            <p>
                <?= CHtml::decode($this->about_value_p2); ?>
            </p>
        </div>
    </section>

    <!-- GALLERY -->
    <?php if (!empty($galleryImages)): ?>
        <section class="about-gallery">
            <div class="about-gallery-grid">

                <?php foreach ($galleryImages as $img): ?>

                    <?php
                    $size = @getimagesize($_SERVER['DOCUMENT_ROOT'] . $img);

                    $orientation = 'portrait';

                    if ($size) {
                        $width  = $size[0];
                        $height = $size[1];

                        if ($width > $height) {
                            $orientation = 'landscape';
                        }
                    }
                    ?>

                    <div class="about-gallery-item <?= $orientation; ?>">
                        <img src="<?= $img; ?>" alt="Gallery">
                    </div>

                <?php endforeach; ?>

            </div>
        </section>
    <?php endif; ?>

</section>
<br>

<!-- TRANSITION TO EVENT -->

<?php $this->renderPartial('//layouts/_contact'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>
