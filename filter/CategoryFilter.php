<?php

namespace app\filter;

use app\models\Article;
use app\models\Category;
use app\models\Junction;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CategoryFilter extends Model
{
    public function getArray($model)
    {
        $arrayId = [];
        foreach ($model as $id) {
            $arrayId[] = $id->id_article;
        };
        return $arrayId;

    }

    public function filter_article($model)
    {
        $junction = Article::find()
            ->andWhere([
                "id" => $this->getArray($model)
            ]);
        return new ActiveDataProvider([
            'query' => $junction,
        ]);
    }

}