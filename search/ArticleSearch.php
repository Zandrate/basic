<?php

namespace app\search;

use app\models\Article;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ArticleSearch extends Model
{
    public function search()
    {
        $blogs = Article::find();

        return new ActiveDataProvider([
            'query' => $blogs,
        ]);
    }
}