<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/gallery_page.css'
);

$this->pageTitle = 'Gallery | Tip Tap Toe';

// ambil semua feed (lebih banyak dari homepage)
$posts = $this->getInstagramFeed(30);


?>

<section class="gallery-page"  style="
        --gallery-bg-1: <?= CHtml::encode($galleryBg1); ?>;
        --gallery-bg-2: <?= CHtml::encode($galleryBg2); ?>;
        ">

    <!-- HERO -->
    <header class="gallery-hero">
        <h1 class="gallery-title">
            Moments & Atmosphere
        </h1>

        <div class="gallery-sub">
            <span class="dot"></span>
            <span>Captured stories from Tip Tap Toe</span>
        </div>
    </header>

    <!-- GALLERY GRID -->
    <?php if (!empty($posts)): ?>
        <div class="gallery-grid">

            <?php foreach ($posts as $post): ?>

                <?php
                $img = ($post['media_type'] === 'VIDEO')
                    ? $post['thumbnail_url']
                    : $post['media_url'];
                ?>

                <div class="gallery-item"
                     data-url="<?= CHtml::encode($post['permalink']) ?>"
                     data-link="off">

                    <img src="<?= CHtml::encode($img) ?>"
                         loading="lazy"
                         alt="Instagram Gallery">

                    <span class="gallery-overlay">
        <i class="fa-brands fa-instagram"></i>
    </span>

                </div>


            <?php endforeach; ?>

        </div>
    <?php else: ?>

        <div class="gallery-empty">
            No gallery available at the moment
        </div>

    <?php endif; ?>

</section>

<script>
    document.addEventListener('click', function (e) {
        const item = e.target.closest('.gallery-item');
        if (!item) return;

        if (item.dataset.link === 'on' && item.dataset.url) {
            window.open(item.dataset.url, '_blank', 'noopener,noreferrer');
        }
    });
</script>


