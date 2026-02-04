<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/music_page.css'
);

$this->pageTitle = 'Music | Tip Tap Toe';

// ambil semua feed
$posts = $this->getMusicImage(30);
$hasMusic = isset($posts) && is_array($posts) && count($posts) > 0;
?>

<section class="music-page" style="
        --music-bg-1: <?= CHtml::encode($musicBg1); ?>;
        --music-bg-2: <?= CHtml::encode($musicBg2); ?>;
        ">

    <!-- HERO -->
    <header class="music-hero">
        <h1 class="music-title">Music & Atmosphere</h1>
        <div class="music-sub">
            <span class="dot"></span>
            <span>Captured music from Tip Tap Toe</span>
        </div>
    </header>

    <?php if ($hasMusic): ?>

        <!-- MUSIC GRID -->
        <div class="music-grid">

            <?php foreach ($posts as $post): ?>

                <?php
                $img = ($post['media_type'] === 'VIDEO')
                    ? $post['thumbnail_url']
                    : $post['media_url'];
                ?>

                <div class="music-item">
                    <img
                            src="<?= CHtml::encode($img) ?>"
                            data-full="<?= CHtml::encode($img) ?>"
                            loading="lazy"
                            class="music-popup-trigger"
                            alt="Music atmosphere"
                    >
                    <span class="music-overlay"></span>
                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <!-- EMPTY STATE -->
        <div class="music-empty hero">
            <div class="music-empty-inner">
                <h1>No Music Yet</h1>
                <p>
                    We’re preparing moments of music & atmosphere at Tip Tap Toe.<br>
                    Stay tuned and follow our social media for updates.
                </p>
            </div>
        </div>

    <?php endif; ?>

</section>

<!-- LIGHTBOX -->
<div class="music-lightbox" id="musicLightbox">
    <span class="lightbox-close">&times;</span>

    <span class="music-nav prev">&#10094;</span>
    <img class="lightbox-img" id="lightboxImg">
    <span class="music-nav next">&#10095;</span>
</div>
