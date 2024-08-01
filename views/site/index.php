<?php

/** @var yii\web\View $this */

/** @var \yii\data\ArrayDataProvider $dataProvider */


use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = Yii:: $app->name;
?>
<div class="row">
<?=ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_post',
]);?>
</div>

