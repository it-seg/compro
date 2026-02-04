<?php if (!empty($menus)): ?>

    <div class="menu-section">

        <!-- HEADER -->
        <div class="menu-head">
            <h2 class="menu-title">
                <?= CHtml::encode($this->menu_title); ?>
                <span><?= CHtml::encode($this->menu_sub_title); ?></span>
            </h2>
        </div>

        <!-- SLIDER WRAP -->
        <div class="menu-slider-wrap">

            <!-- LEFT ARROW -->
            <button class="menu-arrow left" aria-label="Scroll Left">‹</button>

            <!-- MENU GRID -->
            <div class="menu-grid menu-scroll">

                <?php foreach ($menus as $m): ?>
                    <a href="<?= Yii::app()->createUrl('site/menu', ['section' => $m['slug']]) ?>"
                       class="menu-card">

                        <img src="<?= CHtml::encode($m['cover']); ?>"
                             alt="<?= CHtml::encode($m['name']); ?>">

                        <div class="menu-label">
                            <?= CHtml::encode($m['name']); ?>
                        </div>

                    </a>
                <?php endforeach; ?>

            </div>

            <!-- RIGHT ARROW -->
            <button class="menu-arrow right" aria-label="Scroll Right">›</button>

        </div>

        <!-- DIVIDER -->
        <div class="menu-divider">
            <span></span>
        </div>

    </div>

    <!-- MINI JS (SCROLL) -->
    <script>
        document.querySelectorAll('.menu-arrow').forEach(btn => {
            btn.addEventListener('click', () => {
                const grid = btn.closest('.menu-slider-wrap')
                    .querySelector('.menu-scroll');

                const scrollAmount = grid.clientWidth * 0.8;

                grid.scrollBy({
                    left: btn.classList.contains('left')
                        ? -scrollAmount
                        : scrollAmount,
                    behavior: 'smooth'
                });
            });
        });

        document.querySelectorAll('.menu-scroll').forEach(slider => {

            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', e => {
                isDown = true;
                slider.classList.add('dragging');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });

            slider.addEventListener('mouseleave', () => {
                isDown = false;
            });

            slider.addEventListener('mouseup', () => {
                isDown = false;
            });

            slider.addEventListener('mousemove', e => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 1.6; // speed
                slider.scrollLeft = scrollLeft - walk;
            });

        });
    </script>

<?php endif; ?>
