<?php
$event_title     = isset($event_title)     ? $event_title     : $this->event_title;
$event_sub_title = isset($event_sub_title) ? $event_sub_title : $this->event_sub_title;
$event_button    = isset($event_button)    ? $event_button    : $this->event_button;
$events          = isset($events)          ? $events          : $this->events;
?>

<div class="event-section">

    <!-- HEADER -->
    <div class="event-header event-center">
        <div class="event-title-wrap">

            <h2 class="event-title">
                <?= CHtml::encode($event_title); ?>
            </h2>

            <div class="event-sub">
                <span class="dot"></span>
                <span><?= CHtml::encode($event_sub_title); ?></span>
            </div>

        </div>
    </div>

    <!-- SLIDER -->
    <div class="swiper event-swiper">

        <div class="swiper-wrapper">

            <?php if (empty($events)): ?>

                <div class="no-event">
                    No events scheduled
                </div>

            <?php else: ?>

                <?php foreach ($events as $event): ?>

                    <div class="swiper-slide">
                        <div class="event-card">

                            <img src="<?= $event->image_url
                                ? Yii::app()->baseUrl . $event->image_url
                                : Yii::app()->baseUrl . '/images/events/default.png'
                            ?>" alt="<?= CHtml::encode($event->title); ?>">

                            <div class="event-label">
                                <?= date('d M Y', strtotime($event->event_date)); ?>
                                <?= $event->event_time ? ' - ' . substr($event->event_time, 0, 5) : '' ?>
                            </div>

                            <div class="event-title-card">
                                <div class="event-actions">
                                    <a href="<?= Yii::app()->createUrl('site/event_detail', ['id' => $event->id]) ?>"
                                       class="btn-learn">
                                        <?= CHtml::encode($event_button); ?>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <!-- ARROWS -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <div class="swiper-pagination"></div>

    </div>

</div>
