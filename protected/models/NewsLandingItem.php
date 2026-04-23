<?php

class NewsLandingItem extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'news_landing_item';
    }
}
