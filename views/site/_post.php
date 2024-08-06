<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/** @var \app\models\Article $model */
?>


<h2> <?= $model->title ?></h2>
<p><?php echo substr($model->text, 0, 200) . '...' ?></p>
<p><a class="btn btn - outline - secondary bg-primary" href="<?= Url::to(
        [
            'site/view',
            'id' => $model->id,
            'about' => $model->about,
            'title' => $model->title,
            'text' => $model->text,
        ])
    ?>">Read&raquo;</a></p>


