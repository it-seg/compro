<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/menu_page.css'
);

$active = $activeSection ?? null;
?>

<div class="menu-book" style="
        --menu-bg-1: <?= CHtml::encode($menuBg1); ?>;
        --menu-bg-2: <?= CHtml::encode($menuBg2); ?>;
        ">

    <!-- TABS -->
    <div class="menu-tabs">
        <?php foreach ($menus as $m): ?>
            <button
                    class="<?= $active === $m['slug'] ? 'active' : '' ?>"
                    data-target="<?= CHtml::encode($m['slug']); ?>">
                <?= CHtml::encode($m['name']); ?>
            </button>
        <?php endforeach; ?>
    </div>


    <!-- ================= MENU CONTENT ================= -->

    <?php foreach ($menus as $m): ?>

        <?php
        $images = $this->getMenuImages($m['slug']);
        ?>

        <div class="menu-pages <?= $active === $m['slug'] ? 'active' : '' ?>"
             id="<?= CHtml::encode($m['slug']); ?>">

            <?php foreach ($images as $img): ?>
                <img src="<?= $img; ?>" alt="<?= CHtml::encode($m['name']); ?>">
            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

</div>
