<?php

use app\models\Article;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**@var Article $model * */
/**@var string $main_title * */
?>
    <div style="text-align: center;"><h1><?= $main_title ?></h1></div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'about') ?>
<?= $form->field($model, 'text')->textarea(['row' => 10]) ?>
<?= Html::submitButton('Сохранить статью', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>