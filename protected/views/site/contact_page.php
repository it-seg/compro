<section class="contact-page">

    <!-- PAGE HEADER -->
    <header class="contact-page-header">

        <h1 class="contact-page-heading">
            <?= CHtml::encode($this->contact_title); ?>
        </h1>

        <a href="https://wa.me/<?= $this->whatsApp_number ?>
?text=<?= urlencode('Halo, saya ingin menghubungi Tip Tap Toe. Mohon informasinya.'); ?>"
           class="contact-page-wa-btn"
           target="_blank">
            <?= CHtml::encode($this->contact_button); ?>
        </a>
    </header>

    <!-- CONTACT + SOCIAL (DITUKER) -->
    <div class="contact-page-wrap">

        <div class="contact-page-map-full">
            <iframe
                    src="<?= $this->map ?>"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- LEFT : CONTACT INFO -->
        <div class="contact-page-info">

            <ul class="contact-page-list">

                <li class="contact-page-main">
                    <span class="contact-page-label"><?= CHtml::encode($this->phone_title); ?></span>
                    <span class="contact-page-value"><?= $this->phone_number ?></span>
                </li>

                <li class="contact-page-main">
                    <span class="contact-page-label">Email</span>
                    <span class="contact-page-value"><?= $this->email ?></span>
                </li>

                <li class="contact-page-item">
                    <span class="contact-page-label"><?= CHtml::encode($this->hours_title); ?></span>
                    <span class="contact-page-value"><?= $this->address_value; ?></span>
                </li>

                <li class="contact-page-item">
                    <span class="contact-page-label"><?= CHtml::encode($this->address_title); ?></span>
                    <span class="contact-page-value"><?= $this->address ?></span>
                </li>

            </ul>

        </div>
    </div>

</section>
