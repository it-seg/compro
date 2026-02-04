<?php

class Event extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'events';
    }

    public function rules()
    {
        return [
            ['title, event_date', 'required'],
            ['description, image_url, event_time', 'safe'],
        ];
    }

    public function scopes()
    {
        return [
            'active' => ['condition' => 'is_active = 1'],
            'upcoming' => ['condition' => 'event_date >= CURDATE()', 'order' => 'event_date ASC'],
        ];
    }
}
