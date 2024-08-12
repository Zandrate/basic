<?php

/** @var yii\web\View $this */

/** @var \yii\data\ArrayDataProvider $dataProvider */

/** @var  $data_category */


use yii\widgets\ListView;
use yii\helpers\Url;

$this->title = Yii:: $app->name;
?>
Фильтрация по тегам:<br>

<?php foreach ($data_category as $tag): ?>

    <a class="btn btn-outline-danger" href="<?= Url::to(
        [
            'site/filtering',
            'tag_id' => $tag->id,

        ]
    ) ?>">
        <?= $tag->title ?>
    </a>
<?php endforeach; ?>
<p><?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post'
    ]); ?>
