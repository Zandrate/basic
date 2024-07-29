<?php

/** @var yii\web\View $this */

/** @var $blogs */

use yii\helpers\Url;

$this->title = Yii:: $app->name;

?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php foreach ($blogs as $blog): ?>
                <div class="col-lg-4 mb-3">
                    <?php $url = Url::to(
                            [
                            'site/view',
                        'id' => $blog->id,
                        'about'=>$blog->about,
                        'title'=>$blog->title,
                        'text'=>$blog->text,
                            ])
                    ?>

                    <h2><a href="<?=$url?>"> <?php echo $blog->title  ?></a></h2>

                    <p><?php echo substr($blog->text, 0, 200).'...'?></p>

                    <p><a class="btn btn - outline - secondary" href="<?= $url?>">Read&raquo;</a></p>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
