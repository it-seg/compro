<?php
class NavigationLanding extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'navigation_landing';
    }


}
