<?php if (!empty($news)): ?>

    <section class="news-section">

        <!-- HEADER -->
        <div class="news-header">
            <h2 class="news-title"><?= CHtml::encode($this->news_title); ?></h2>

            <div class="news-sub">
                <span class="dot"></span>
                <span><?= CHtml::encode($this->news_sub_title); ?></span>
            </div>
        </div>

        <!-- GRID -->
        <div class="news-grid">

            <?php foreach ($news as $n): ?>

                <article class="news-card">

                    <div class="news-image">
                        <img
                                src="<?= Yii::app()->baseUrl ?><?= CHtml::encode($n['image']); ?>"
                                alt="<?= CHtml::encode($n['title']); ?>">
                    </div>

                    <div class="news-content">


                        <h3><?= CHtml::encode($n['title']); ?></h3>
                        <span class="news-date"><?= CHtml::encode($n['date']); ?></span>

                        <?php if (!empty($n['short'])): ?>
                            <p><?= CHtml::encode($n['short']); ?></p>
                        <?php endif; ?>


                        <a class="news-link"
                           href="<?= Yii::app()->createUrl('site/newsDetail', [
                               'slug' => $n['slug']
                           ]); ?>">
                            Read More
                        </a>
                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </section>

<?php endif; ?>
