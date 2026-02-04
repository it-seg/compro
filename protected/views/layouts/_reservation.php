<div class="reservation-section">

    <!-- Background pattern -->
    <div class="reservation-bg">

        <div class="reservation-card">

            <p class="reservation-text">
                <span class="subtitle"><?= CHtml::encode($this->reservation); ?></span><br>
                <span class="desc"><?= CHtml::encode($this->sub_reservation); ?> </span>
            </p>


            <a href="https://wa.me/<?= $this->whatsApp_number ?>?text=<?= urlencode('Halo, saya mau reservasi') ?>"
               target="_blank"
               class="reservation-btn">
                Join Reservations
            </a>

        </div>

    </div>

</div>
