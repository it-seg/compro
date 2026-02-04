<?php

class EventController extends Controller
{
    public function actionIndex()
    {
        $events = Event::model()->active()->upcoming()->findAll();

        $this->render('index', [
            'events' => $events,
        ]);
    }
}
