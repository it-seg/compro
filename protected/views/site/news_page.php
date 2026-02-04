<?php
$this->pageTitle = 'News | Tip Tap Toe';

/**
 * SAFETY CHECK
 */
$hasNews = isset($news) && is_array($news) && count($news) > 0;

/**
 * SPLIT MAIN & OTHER NEWS (SAFE)
 */
$mainNews = null;
$otherNews = [];

if ($hasNews) {
    foreach ($news as $n) {
        if (isset($n['is_main']) && (int)$n['is_main'] === 1 && !$mainNews) {
            $mainNews = $n;
        } else {
            $otherNews[] = $n;
        }
    }

    // fallback: kalau tidak ada main news, ambil 1 berita pertama
    if (!$mainNews && !empty($otherNews)) {
        $mainNews = array_shift($otherNews);
    }
}
?>

<section class="news-page">

    <?php if ($hasNews && $mainNews): ?>

        <!-- PAGE HEADER -->
        <header class="news-page-hero">
            <h1 class="news-page-title">Latest News</h1>
            <div class="news-page-sub">
                <span class="dot"></span>
                <span>Stories & Updates from Tip Tap Toe</span>
            </div>
        </header>

        <!-- MAIN NEWS -->
        <article class="news-main">

            <img
                    src="<?= Yii::app()->baseUrl . CHtml::encode($mainNews['image']); ?>"
                    alt="<?= CHtml::encode($mainNews['title']); ?>">

            <div class="news-main-content">


                <h2><?= CHtml::encode($mainNews['title']); ?></h2>
                <span class="news-date">
                <?= CHtml::encode($mainNews['date']); ?>
            </span>

                <?php if (!empty($n['short'])): ?>
                    <p><?= CHtml::encode($n['short']); ?></p>
                <?php endif; ?>

                <a class="news-main-link"
                   href="<?= Yii::app()->createUrl('site/newsDetail', [
                       'slug' => $mainNews['slug']
                   ]); ?>">
                    Read Full Story
                </a>
            </div>

        </article>

        <!-- OTHER NEWS -->
        <?php if (!empty($otherNews)): ?>

            <div class="other-news-header">
                <h3>Other News</h3>
                <div class="other-news-sub">
                    <span class="dot"></span>
                    <span>More updates from Tip Tap Toe</span>
                </div>
            </div>

            <div class="news-list-grid">

                <?php foreach ($otherNews as $n): ?>

                    <article class="news-list-card">

                        <img
                                src="<?= Yii::app()->baseUrl . CHtml::encode($n['image']); ?>"
                                alt="<?= CHtml::encode($n['title']); ?>">

                        <div class="news-list-content">
                        <span class="news-date">
                            <?= CHtml::encode($n['date']); ?>
                        </span>

                            <h3><?= CHtml::encode($n['title']); ?></h3>

                            <?php if (!empty($n['short'])): ?>
                                <p><?= CHtml::encode($n['short']); ?></p>
                            <?php endif; ?>

                            <a class="news-read-more"
                               href="<?= Yii::app()->createUrl('site/newsDetail', [
                                   'slug' => $n['slug']
                               ]); ?>">
                                Read Full Story
                            </a>
                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    <?php else: ?>

        <!-- EMPTY STATE -->
        <div class="news-empty">
            <div class="news-empty-inner">
                <h1>No News Yet</h1>
                <p>
                    We’re preparing stories and updates from Tip Tap Toe.<br>
                    Stay tuned and follow our social media for the latest news.
                </p>
            </div>
        </div>

    <?php endif; ?>

</section>
