<?php if (!empty($spaces)): ?>

    <div class="space-section">

        <!-- HEADER -->
        <div class="space-header space-center">
            <div class="space-title-wrap">
                <h2 class="space-title">
                    <?= CHtml::encode($this->space_title); ?>
                </h2>

                <div class="space-sub">
                    <span class="dot"></span>
                    <span><?= CHtml::encode($this->space_sub_title); ?></span>
                </div>
            </div>
        </div>

        <!-- SLIDER -->
        <div class="swiper space-swiper">
            <div class="swiper-wrapper">

                <?php foreach ($spaces as $s): ?>

                    <div class="swiper-slide">
                        <div class="space-card">

                            <img
                                    src="<?= CHtml::encode($s['cover']); ?>"
                                    alt="<?= CHtml::encode($s['title']); ?>">

                            <!-- TITLE BADGE -->
                            <div class="space-label">
                                <?= CHtml::encode($s['title']); ?>
                            </div>

                            <!-- CTA -->
                            <a href="<?= Yii::app()->createUrl('site/spaceDetail', [
                                'slug' => $s['slug']
                            ]); ?>"
                               class="space-cta">
                                <?= CHtml::encode($this->space_view_button); ?>
                            </a>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

<?php endif; ?>
