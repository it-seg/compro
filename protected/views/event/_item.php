<div class="position-relative" style="height:420px; overflow:hidden;">
    <img src="<?= CHtml::encode(Yii::app()->baseUrl . '/images/events/' . $event->image_url) ?>"
         class="d-block w-100 h-100"
         style="object-fit:cover;">
</div>

<div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
    <h4><?= CHtml::encode($event->title) ?></h4>
    <p><?= CHtml::encode($event->description) ?></p>
    <small>
        <?= date('d M Y', strtotime($event->event_date)) ?>
        <?php if ($event->event_time): ?>
            • <?= date('H:i', strtotime($event->event_time)) ?>
        <?php endif; ?>
    </small>
</div>
