<?php
$this->pageTitle = CHtml::encode($news['title']) . ' | Tip Tap Toe';
?>

<section class="news-detail-page">

    <!-- HEADER -->
    <header class="news-detail-header">

        <h1 class="news-detail-title"><?= CHtml::encode($news['title']); ?></h1>
        <span class="news-detail-date"><?= CHtml::encode($news['date']); ?></span>
    </header>

    <!-- HERO IMAGE -->
    <div class="news-detail-hero">
        <img
                src="<?= Yii::app()->baseUrl ?><?= CHtml::encode($news['image']); ?>"
                alt="<?= CHtml::encode($news['title']); ?>">
    </div>

    <!-- CONTENT -->
    <article class="news-detail-content">
        <?= $news['content']; ?>
    </article>

    <!-- BACK -->
    <div class="news-back">
        <a href="<?= Yii::app()->createUrl('site/news'); ?>">
            ← Back to News
        </a>
    </div>

    <!-- DIVIDER -->
    <div class="news-divider"></div>

    <!-- RELATED NEWS -->
    <?php if (!empty($relatedNews)): ?>

        <section class="related-news">

            <header class="related-news-header">
                <h3>Other Stories</h3>
                <div class="related-news-sub">
                    <span class="dot"></span>
                    <span>You might also enjoy</span>
                </div>
            </header>

            <div class="related-news-grid">

                <?php foreach ($relatedNews as $n): ?>

                    <article class="related-news-card">
                        <a href="<?= Yii::app()->createUrl('site/newsDetail', [
                            'slug' => $n['slug']
                        ]); ?>">

                            <img
                                    src="<?= Yii::app()->baseUrl ?><?= CHtml::encode($n['image']); ?>"
                                    alt="<?= CHtml::encode($n['title']); ?>">

                            <div class="related-news-content">
                                <span class="news-date"><?= CHtml::encode($n['date']); ?></span>
                                <h4><?= CHtml::encode($n['title']); ?></h4>
                            </div>

                        </a>
                    </article>

                <?php endforeach; ?>

            </div>

        </section>

    <?php endif; ?>

</section>
