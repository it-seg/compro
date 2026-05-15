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
        <div class="space-slider-wrap">

            <!-- LEFT -->
            <button class="space-arrow left" aria-label="Scroll Left">‹</button>

            <div class="space-scroll <?= count($spaces) <= 3 ? 'space-showcase' : ''; ?>">

                <?php foreach ($spaces as $s): ?>

                    <div class="space-item">
                        <div class="space-card">

                            <img
                                    src="<?= CHtml::encode($s['cover']); ?>"
                                    alt="<?= CHtml::encode($s['title']); ?>">

                            <div class="space-label">
                                <?= CHtml::encode($s['title']); ?>
                            </div>

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

            <!-- RIGHT -->
            <button class="space-arrow right" aria-label="Scroll Right">›</button>

        </div>

    </div>

<?php endif; ?>
