<?php
/**@var $title **/
/**@var $text **/
/**@var $about **/
use yii\bootstrap5\Html;

$this->title = $title;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<div class="row">
    <div class="col-md-10">

        <div style="text-align: center;"><h2><b><?php echo $title ?></b> </h2></div>
        <?php echo 'автор:'.$about?>
        <p><?php echo $text?></p>
        <div class="btn-group" role="group" aria-label="Простой пример">
            <button type="button" class="btn btn-primary" href="">Редактировать</button>
            <button type="button" class="btn btn-primary">Удалить</button>
        </div>


    </div>
    <div class="col-md-1">

        <h2><b>Теги</b> </h2>
        <p>тег1</p>
        <p>тег2</p>


    </div>
</div>

</html>