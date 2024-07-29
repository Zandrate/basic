<?php

namespace app\models;

use yii\db\ActiveRecord;

class Blogs extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'blogs';
    }
}