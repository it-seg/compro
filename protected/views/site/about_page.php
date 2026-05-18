<?php
$this->pageTitle = '';

$images = $this->getAboutImages();

$heroImage = null;
$galleryImages = [];

if (!empty($images)) {

    foreach ($images as $index => $img) {

        $filename = strtolower(basename($img));

        /*
         |------------------------------------------
         | HERO IMAGE
         |------------------------------------------
         | jika nama file mengandung:
         | cover / hero / banner
         */

        if (
            strpos($filename, 'cover') !== false ||
            strpos($filename, 'hero') !== false ||
            strpos($filename, 'banner') !== false
        ) {

            $heroImage = $img;

        } else {

            $galleryImages[] = $img;
        }
    }

    /*
     |------------------------------------------
     | FALLBACK HERO
     |------------------------------------------
     | jika tidak ada file cover,
     | gunakan gambar pertama
     */

    if (!$heroImage && !empty($images)) {

        $heroImage = $images[0];

        unset($galleryImages[0]);
    }
}
?>

    <section class="about-page">

        <!-- HERO -->
        <?php if (!empty($heroImage)): ?>

            <section class="about-hero-full">

                <img
                        src="<?= $heroImage; ?>"
                        alt="Hero Image"
                        loading="eager"
                >


            </section>

        <?php endif; ?>

        <!-- STORY -->

        <section class="about-story">

            <div class="about-story-inner"><p class="lead"></p>

                    <h1>
                        <?= CHtml::encode($this->about_title); ?>
                    </h1>

                    <p>
                        <?= CHtml::encode($this->about_sub_title); ?>
                    </p>

                <p class="lead">
                    <?= CHtml::decode($this->about_value_p1); ?>
                </p>


                <!-- GALLERY -->
                <?php if (!empty($galleryImages)): ?>

                    <section class="about-gallery">

                        <div class="about-gallery-grid">

                            <?php foreach ($galleryImages as $img): ?>

                                <?php

                                $orientation = 'portrait';

                                $filePath = Yii::getPathOfAlias('webroot') . $img;

                                if (file_exists($filePath)) {

                                    $size = @getimagesize($filePath);

                                    if ($size) {

                                        $width  = $size[0];
                                        $height = $size[1];

                                        if ($width > $height) {
                                            $orientation = 'landscape';
                                        }
                                    }
                                }

                                ?>

                                <div class="about-gallery-item <?= $orientation; ?>">

                                    <img
                                            src="<?= $img; ?>"
                                            alt="Gallery"
                                            loading="lazy"
                                    >

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </section>

                <?php endif; ?>


                <p>
                    <?= CHtml::decode($this->about_value_p2); ?>
                </p>
                <p class="lead"></p>
                <br>

            </div>

        </section>



    </section>
<br>
<?php $this->renderPartial('//layouts/_contact'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>