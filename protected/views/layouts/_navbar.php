<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold"
           href="<?= Yii::app()->homeUrl; ?>">
            <img
                    src="<?= Yii::app()->baseUrl . $this->logo; ?>"
                    alt="Tip Tap Toe"
                    class="navbar-logo">
        </a>

        <!-- LANGUAGE SWITCH -->
        <div class="lang-switch">
            <a href="<?= Yii::app()->createUrl('site/setLanguage', ['lang' => 'id']); ?>"
               class="flag flag-id <?= Yii::app()->language === 'id' ? 'active' : '' ?>"
               title="Bahasa Indonesia"></a>

            <a href="<?= Yii::app()->createUrl('site/setLanguage', ['lang' => 'en']); ?>"
               class="flag flag-en <?= Yii::app()->language === 'en' ? 'active' : '' ?>"
               title="English"></a>
        </div>

        <button class="navbar-toggler ms-auto"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center"
             id="mainNavbar">

            <ul class="navbar-nav gap-4">

                <?php foreach ($this->menuItems as $item): ?>

                    <?php
                    $lang = Yii::app()->language;
                    $label = ($lang === 'id' && !empty($item->label_ind))  ? $item->label_ind : $item->label;

                    $currentRoute = Yii::app()->controller->route;
                    $itemRoute    = ltrim($item->url, '/');
                    $isActive     = strpos($currentRoute, $itemRoute) === 0;
                    ?>

                    <li class="nav-item">
                        <a class="nav-link <?= $isActive ? 'active' : '' ?>"
                           href="<?= Yii::app()->createUrl($item->url) ?>">
                            <?= CHtml::encode($label) ?>
                        </a>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    </div>
</nav>
