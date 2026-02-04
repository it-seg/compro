<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/event_detail.css'
);

/* =========================================
   LANGUAGE HANDLER
========================================= */
$lang = Yii::app()->language;

// WA text & button label
$waText = ($lang === 'id')
    ? "Halo, saya ingin reservasi untuk event: {$event->title}"
    : "Hello, I would like to reserve for the event: {$event->title}";

$btnLabel = ($lang === 'id') ? 'RESERVASI' : 'RESERVE';
?>

<div class="event-detail-wrap"  style="
        --event-bg-1: <?= CHtml::encode($eventBg1); ?>;
        --event-bg-2: <?= CHtml::encode($eventBg2); ?>;
        ">
    <div class="event-detail-inner">

        <!-- LEFT IMAGE -->
        <div class="event-image-box">
            <img src="<?= $event->image_url
                ? Yii::app()->baseUrl . $event->image_url
                : Yii::app()->baseUrl . '/images/events/default.png'
            ?>" alt="<?= CHtml::encode($event->title); ?>">
        </div>

        <!-- RIGHT CONTENT -->
        <div class="event-content-box">

            <div class="event-date">
                <?= date('d F Y', strtotime($event->event_date)); ?>
                <?php if ($event->event_time): ?>
                    • <?= substr($event->event_time, 0, 5); ?>
                <?php endif; ?>
            </div>

            <h1 class="event-title">
                <?= CHtml::encode($event->title); ?>
            </h1>

            <div class="event-desc">
                <?= CHtml::decode(
                    strip_tags(
                        $event->description,
                        '<p><br><ul><ol><li><strong><em><b><i>'
                    )
                ); ?>
            </div>


            <a href="https://wa.me/<?= $this->whatsApp_number ?>?text=<?= urlencode($waText); ?>"
               class="event-contact-btn"
               target="_blank">
                <?= $btnLabel; ?>
            </a>

        </div>

    </div>
</div>

<?php
/* ========================================================
   LOAD OTHER EVENTS (LANGUAGE AWARE, EXCLUDE CURRENT)
======================================================== */
$titleCol = ($lang === 'id') ? 'title_ind' : 'title';
$descCol  = ($lang === 'id') ? 'description_ind' : 'description';

$events = Event::model()->findAll([
    'select' => "
        *,
        COALESCE({$titleCol}, title) AS title,
        COALESCE({$descCol}, description) AS description
    ",
    'condition' => 'is_active = 1 AND id != :id',
    'params'    => [':id' => $event->id],
    'order'     => 'event_date DESC',
    'limit'     => 6
]);

/* ========================================================
   DISPLAY OTHER EVENTS (USING _event.php)
======================================================== */
$this->renderPartial('//layouts/_event', [
    'event_title'     => ($lang === 'id') ? 'EVENT LAINNYA' : 'OTHER EVENTS',
    'event_sub_title' => ($lang === 'id')
        ? 'Temukan aktivitas menarik lainnya'
        : 'Discover more of our activities',
    'event_button'    => ($lang === 'id') ? 'LIHAT DETAIL' : 'LEARN MORE',
    'events'          => $events,
]);
?>
