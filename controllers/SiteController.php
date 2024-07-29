<?php

namespace app\controllers;

use app\models\CreateForm;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use app\models\Blogs;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $blogs = Blogs::find()->all();
        return $this->render('index', ['blogs' => $blogs]);
    }


    public function actionView($id, $about, $title, $text): string
    {
        return $this->render('view', ['id'=>$id, 'about'=>$about, 'title'=>$title, 'text'=>$text]);
    }


    /**
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new CreateForm();


        if ( $model->load(Yii::$app->request->post()) ){
            if ( $model->save() ) {
                Yii::$app->session->setFlash('success', 'Статья успешно сохранена');
                return $this->refresh();
            }

        }
        return $this->render('create', compact('model'));
    }


    public function actionSave()
    {

        return $this->goHome();
    }
}
