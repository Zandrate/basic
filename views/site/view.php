<?php
/**@var $title **/
/**@var $text **/
use yii\bootstrap5\Html;
$this->title = $title;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <div class="col-mb-3">

        <h2><?php echo $title  ?></h2>

        <p><?php echo $text?></p>


    </div>


</html>