<?php

namespace app\services;

use app\models\Category;
use app\models\Junction;

class CategoryService
{
    /**@var $tag_id**/
    public function getJunction($tag_id)
    {
        return Junction::find()
            ->andWhere(["id_category" => $tag_id])
            ->all();

    }

    public function getCategory()
    {
        return Category::find()->all();

    }public function getTitleCategory()
    {
        return Category::find()
            ->select(['title'])
            ->asArray()
            ->indexBy('id')
            ->column();

    }

}