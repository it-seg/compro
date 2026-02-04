<section class="site-contact">
    <div class="contact-wrap">
        <!-- CENTER LOGO + SOCIAL -->
        <div class="contact-logo">

            <img src="<?= Yii::app()->baseUrl ?><?= CHtml::encode($this->logo) ?>" alt="Tip Tap Toe">

            <div class="contact-social-label">
                <?= CHtml::encode($this->social_sub_title); ?>
            </div>

            <div class="contact-social">
                <a href="https://www.instagram.com/<?= CHtml::encode($this->instagram_username); ?>/" target="_blank" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/<?= CHtml::encode($this->facebook_username); ?>" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://www.tiktok.com/@<?= CHtml::encode($this->tiktok_username); ?>" target="_blank" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            </div>

        </div>
    </div>

</section>
