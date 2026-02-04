<?php
Yii::app()->clientScript->registerCssFile(
    Yii::app()->baseUrl . '/css/event_page.css'
);

/**
 * SAFETY DEFAULTS
 */
$eventBg1 = $eventBg1 ?? '#1c1c1c';
$eventBg2 = $eventBg2 ?? '#0f0f0f';

/**
 * UPCOMING EVENT CHECK
 */
$hasUpcoming = isset($upcoming) && !empty($upcoming);
$excludeId   = $hasUpcoming ? (int)$upcoming->id : 0;
?>

<div class="event-page-wrap" style="
        --event-bg-1: <?= CHtml::encode($eventBg1); ?>;
        --event-bg-2: <?= CHtml::encode($eventBg2); ?>;
        ">

    <!-- =======================================================
         HERO — UPCOMING EVENT
    ======================================================== -->
    <?php if ($hasUpcoming): ?>

        <section class="event-hero">

            <!-- LEFT LABEL PANEL -->
            <div class="hero-label-box">
                <div class="hero-label-inner">
                    <div class="hero-label-text">
                        <?= CHtml::encode($this->upcoming_event_button ?? 'UPCOMING EVENT'); ?>
                    </div>
                    <div class="hero-label-sub">
                        <?= CHtml::encode($this->highlight_button ?? 'FEATURED'); ?>
                    </div>
                </div>
            </div>

            <!-- POSTER IMAGE -->
            <div class="hero-poster">
                <img
                        src="<?= Yii::app()->baseUrl . $upcoming->image_url; ?>"
                        alt="<?= CHtml::encode($upcoming->title); ?>"
                >
            </div>

            <!-- INFO PANEL -->
            <div class="hero-info">

                <div class="hero-date">
                    <?= date('d F Y', strtotime($upcoming->event_date)); ?>
                    <?= !empty($upcoming->event_time)
                        ? ' • ' . substr($upcoming->event_time, 0, 5)
                        : ''; ?>
                </div>

                <h1 class="hero-title">
                    <?= CHtml::encode($upcoming->title); ?>
                </h1>

                <p class="hero-desc">
                    <?= CHtml::decode(
                        mb_strlen(strip_tags($upcoming->description)) > 180
                            ? mb_substr($upcoming->description, 0, 180) . '...'
                            : $upcoming->description
                    ); ?>
                </p>


                <a href="<?= Yii::app()->createUrl(
                    'site/event_detail',
                    ['id' => $upcoming->id]
                ); ?>"
                   class="hero-btn">
                    <?= CHtml::encode($this->reservation_button ?? 'View Detail'); ?>
                </a>

            </div>

        </section>

    <?php else: ?>

        <!-- ===================================================
             EMPTY STATE — NO UPCOMING EVENT
        ==================================================== -->
        <section class="event-empty hero">
            <div class="event-empty-inner">
                <h1><?= CHtml::encode($this->no_event_title ?? 'No Upcoming Event'); ?></h1>
                <p><?= CHtml::encode($this->no_event_desc ?? 'Stay tuned for our next special event.'); ?></p>
            </div>
        </section>


    <?php endif; ?>


    <?php
    // ========================================================
    // LOAD OTHER EVENTS (SAFE QUERY)
    // ========================================================
    $events = Event::model()->findAll([
        'condition' => 'is_active = 1 AND id != :id',
        'params'    => [':id' => $excludeId],
        'order'     => 'event_date DESC',
        'limit'     => 6
    ]);
    ?>

    <!-- =======================================================
         OTHER EVENTS SECTION
    ======================================================== -->
    <?php if (!empty($events)): ?>

        <?php
        $this->renderPartial('//layouts/_event', [
            'event_title'     => CHtml::encode($this->other_event_title ?? 'Other Events'),
            'event_sub_title' => CHtml::encode($this->other_event_sub_title ?? 'Discover our past & upcoming events'),
            'event_button'    => CHtml::encode($this->other_event_detail_button ?? 'View Detail'),
            'events'          => $events,
        ]);
        ?>

    <?php else: ?>

        <div class="event-empty secondary">
            <p><?= CHtml::encode($this->no_other_event_text ?? 'No other events available.'); ?></p>
        </div>

    <?php endif; ?>

</div>
