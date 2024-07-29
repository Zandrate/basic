<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
/**@var $model **/
?>
<div style="text-align: center;"><h1>Создание новой статьи</h1></div>

<?php if(Yii::$app->session->hasFlash('success')): ?>
        <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif;?>

<?php $form = ActiveForm::begin()?>
    <?= $form->field($model, 'title')->label('Название статьи')?>
    <?= $form->field($model, 'about')->label('Автор статьи')?>
    <?= $form->field($model, 'text')->label('Текст статьи')->textarea(['row'=>10])?>
    <?= Html::submitButton('Сохранить статью', ['class' => 'btn btn-primary'])?>
<?php ActiveForm::end()?>