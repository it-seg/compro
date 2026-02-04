<?php

class Menu extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'menu';
    }

    public function scopes()
    {
        return [
            'active' => ['condition' => 'is_active = 1'],
        ];
    }
}

