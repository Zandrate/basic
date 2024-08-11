<?php

use app\models\Category;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**@var Category $model * */
/**@var string $main_title * */
?>
    <div style="text-align: center;"><h1><?= $main_title ?></h1></div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title') ?>
<?= Html::submitButton('Сохранить тег', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>
