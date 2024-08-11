<?php
/**@var int $id * */
/**@var string $title * */
/**@var string $text * */
/**@var string $about * */

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
$url_tag = Url::to(
    [
        'site/tag',
        'id_article' => $id,
    ]);
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<div style="text-align: center;"><h2><b><?php echo $title ?></b></h2></div>
<?php echo 'Автор: ' . $about ?>
<p><?= $text ?></p>
<div class="btn-group" role="group">
    <p><a class="btn btn - outline - secondary bg-primary" href="<?= $url_edit ?>">Редактировать&raquo;</a></p>
    <p><a class="btn btn - outline - secondary " href="<?= $url_tag ?>">Добавить тег&raquo;</a></p>
    <p><a class="btn btn - outline - secondary bg-danger" href="<?= $url_delete ?>">Удалить&raquo;</a></p>
</div>
</html>