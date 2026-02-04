<section class="about-section">

    <div class="about-container">

        <?php
        $aboutImages = $this->getAboutImages();
        $count = count($aboutImages);
        ?>

        <div class="about-images <?= $count >= 3 ? 'about-images--feature' : '' ?>">

            <?php if ($count >= 3): ?>

                <!-- BIG IMAGE -->
                <div class="about-img about-img--big">
                    <img src="<?= $aboutImages[0]; ?>" alt="About Tip Tap Toe">
                </div>

                <!-- SMALL IMAGES -->
                <div class="about-img about-img--small">
                    <img src="<?= $aboutImages[1]; ?>" alt="">
                </div>

                <div class="about-img about-img--small">
                    <img src="<?= $aboutImages[2]; ?>" alt="">
                </div>

            <?php else: ?>

                <?php foreach ($aboutImages as $i => $img): ?>
                    <div class="about-img <?= $i === 1 ? 'img-right' : 'img-left' ?>">
                        <img src="<?= $img; ?>" alt="About Tip Tap Toe">
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>


        <!-- RIGHT : CONTENT -->
        <div class="about-content">
            <h2>
                <?= CHtml::encode($this->about_title); ?>
                <span><?= CHtml::encode($this->about_sub_title); ?></span>
            </h2>

            <?= CHtml::decode($this->about_value_p1); ?>

            <?= CHtml::decode($this->about_value_p2); ?>

            <a href="<?= Yii::app()->createUrl('site/about_page'); ?>"
               class="about-btn">
                <?= CHtml::encode($this->about_button); ?>
            </a>

        </div>

    </div>

</section>
