<?php

/** @var yii\web\View $this */

/** @var $blogs */

/** @var $tags */

use yii\helpers\Url;

$this->title = Yii:: $app->name;

?>

<div class="row">
    <?php foreach ($blogs as $blog): ?>
        <div class="col-lg-4 mb-3">
            <?php $url = Url::to(
                [
                    'site/view',
                    'id' => $blog->id,
                    'about' => $blog->about,
                    'title' => $blog->title,
                    'text' => $blog->text,
                ])
            ?>

            <h2> <?= $blog->title ?></h2>

            <p><?php echo substr($blog->text, 0, 200) . '...' ?></p>

            <p><a class="btn btn - outline - secondary bg-primary" href="<?= $url ?>">Read&raquo;</a></p>

        </div>
    <?php endforeach; ?>
</div>
