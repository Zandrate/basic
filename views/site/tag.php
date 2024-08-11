<?php

use app\models\Article;
use app\models\Junction;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


/**@var Junction $model * */
/**@var string $title * */
/**@var array $title_category * */
?>
    <div style="text-align: center;"><h1>Добавление тега для статьи <?=$title?></h1></div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'id_category') ->dropDownList($title_category) ?>
<?= Html::submitButton('Прикрепить тег к статье', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>