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
    public function getJunctionId(int $id)
    {
        return Junction::find()
            ->select(['id_category'])
            ->where(['id_article' => $id])
            ->asArray()
            ->all();
    }

    public function getCategory()
    {
        return Category::find()->all();

    }
    public function getTitleCategory()
    {
        return Category::find()
            ->select(['title'])
            ->asArray()
            ->indexBy('id')
            ->column();

    }
    public function getFiltrTitleCategory(array $id_category = null)
    {
        return Category::find()
            ->select(['title'])
            ->where(['id' => $id_category])
            ->asArray()
            ->indexBy('id')
            ->column();

    }

    public function getArrayCategory(array $id_category)
    {
        $array_id = [];
        foreach ($id_category as $id) $array_id[]=$id['id_category'];

        return $array_id;
    }

}