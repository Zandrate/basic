<?php

namespace app\models;

use yii\db\ActiveRecord;

class Blogs extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'blogs';
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название статьи',
            'about' => 'Автор статьи',
            'text' => 'Текст статьи',
        ];
    }


    public function rules()
    {
        return [
            [['title', 'about', 'text'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['text', 'safe'],
        ];

    }
}