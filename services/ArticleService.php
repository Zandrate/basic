<?php

namespace app\services;

use app\models\Article;

class ArticleService
{
    public function getArticleModels(int $id)
    {
        return Article::find()
            ->andWhere(["id" => $id])
            ->one();
    }
}