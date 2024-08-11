<?php

use app\models\Article;
use app\models\Junction;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**@var Article $model * */
/**@var Junction $junction * */
/**@var string $main_title * */
/**@var array $title_category * */
?>
    <div style="text-align: center;"><h1><?= $main_title ?></h1></div>

<?php if (Yii::$app->session->hasFlash('success')) {
    echo Yii::$app->session->getFlash('success');
}

$form = ActiveForm::begin();
echo $form->field($model, 'title');
echo $form->field($model, 'about');
echo $form->field($model, 'text')->textarea(['row' => 10]);
if (isset($title_category)){
    echo $form->field($junction, 'id_category')->dropDownList($title_category);
}
echo Html::submitButton('Сохранить статью', ['class' => 'btn btn-primary']);
ActiveForm::end();