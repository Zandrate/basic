<?php

namespace app\models;

class Blog extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'blog';
    }
}