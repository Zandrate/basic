<?php

namespace app\models;

use yii\db\ActiveRecord;

class Junction extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'junction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_article', 'id_category'], 'integer'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_article'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['id_article' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_article' => 'Статья',
            'id_category' => 'Тег'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'id_article']);
    }

}