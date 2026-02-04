<?php
// ambil 10 post ig via helper Controller.php
$posts = $this->getInstagramFeed(10);
?>

<div class="social-section">

    <!-- SOCIAL HEADER -->
    <div class="social-header">

        <h3 class="social-title">
            <?= CHtml::encode($this->social_title); ?>
        </h3>

        <div class="social-sub">
            <span class="dot"></span>
            <span><?= CHtml::encode($this->social_sub_title); ?></span>
        </div>

    </div>


    <div class="social-icons">
        <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <i class="fa-brands fa-instagram"></i>
        </a>

        <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
        </a>

        <a href="https://tiktok.com" target="_blank" aria-label="TikTok">
            <i class="fa-brands fa-tiktok"></i>
        </a>
    </div>


    <!-- SLIDER INSTAGRAM -->
    <?php if(!empty($posts)): ?>
        <div class="swiper ig-swiper">

            <div class="swiper-wrapper">

                <?php foreach($posts as $post): ?>

                    <?php
                    $img = ($post['media_type']==='VIDEO')
                        ? $post['thumbnail_url']
                        : $post['media_url'];
                    ?>

                    <a class="swiper-slide ig-item"
                       href="<?= CHtml::encode($post['permalink']) ?>"
                       target="_blank"
                       rel="noopener">

                        <img src="<?= CHtml::encode($img) ?>"
                             loading="lazy"
                             alt="Instagram post">

                    </a>

                <?php endforeach; ?>

            </div>

            <!-- NAV -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    <?php endif; ?>

</div>
