<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/space_page.css'
);

$this->pageTitle = 'Our Spaces | Tip Tap Toe';
?>

<section class="space-page">

    <!-- HEADER -->
    <header class="space-page-hero">
        <h1 class="space-page-title">
            <?= CHtml::encode($this->space_title); ?>
        </h1>

        <div class="space-page-sub">
            <span class="dot"></span>
            <span><?= CHtml::encode($this->space_sub_title); ?></span>
        </div>
    </header>

    <!-- GRID -->
    <?php if (!empty($spaces)): ?>

        <div class="space-page-grid">

            <?php foreach ($spaces as $s): ?>

                <article class="space-page-card">

                    <img
                            src="<?= CHtml::encode($s['cover']); ?>"
                            alt="<?= CHtml::encode($s['title']); ?>">

                    <div class="space-page-overlay">

                        <h3><?= CHtml::encode($s['title']); ?></h3>
<!--                        <p>--><?php //= CHtml::encode($s['desc']); ?><!--</p>-->

                        <a href="<?= Yii::app()->createUrl('site/spaceDetail', [
                            'slug' => $s['slug']
                        ]); ?>"
                           class="space-page-cta">
                            <?= CHtml::encode($this->space_view_button); ?>
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</section>
