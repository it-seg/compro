<?php if (empty($events)) : ?>
    <p class="text-center">Tidak ada acara mendatang.</p>
<?php else : ?>

    <div id="eventCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($events as $i => $e): ?>
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="<?= $i ?>"
                        class="<?= $i === 0 ? 'active' : '' ?>" aria-current="<?= $i === 0 ? 'true' : 'false' ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($events as $i => $e): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                    <?php $this->renderPartial('_item', ['event' => $e]); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

<?php endif; ?>
