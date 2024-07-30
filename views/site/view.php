<?php
/**@var $id * */
/**@var $title * */
/**@var $text * */

/**@var $about * */

use yii\bootstrap5\Html;
use yii\helpers\Url;


$this->title = $title;
$url_edit = Url::to(
    [
        'site/edit',
        'id' => $id,
    ]);
$url_delete = Url::to(
    [
        'site/delete',
        'id' => $id,
    ]);
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
        <div style="text-align: center;"><h2><b><?php echo $title ?></b></h2></div>
        <?php echo 'Автор: ' . $about ?>
        <p><?= $text ?></p>
        <div class="btn-group" role="group" aria-label="Простой пример">
            <p><a class="btn btn - outline - secondary bg-primary" href="<?= $url_edit ?>">Редактировать&raquo;</a></p>
            <p><a class="btn btn - outline - secondary bg-danger" href="<?= $url_delete ?>">Удалить&raquo;</a></p>
        </div>
</html>