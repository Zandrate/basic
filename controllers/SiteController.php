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
    public function actionIndex($tag=null): string
    {
        $tags = Blogs::find()->select('tag')->all();
        if ($tag){
            $blogs = Blogs::find()->where(['tag' => $tag])->all();
        }else {
            $blogs = Blogs::find()->all();
        }
        return $this->render('index', compact('blogs', 'tags'));
    }


    public function actionView($id, $about, $title, $text): string
    {
        return $this->render('view', ['id' => $id, 'about' => $about, 'title' => $title, 'text' => $text]);
    }


    /**
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new CreateForm();
        $main_title = 'Создание новой статьи';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статья успешно сохранена');
                return $this->refresh();
            }

        }
        return $this->render('create', compact('model', 'main_title'));
    }


    public function actionEdit(int $id)
    {
        $model = CreateForm::find()
            ->andWhere(["id"=>$id])
            ->one();

        $main_title = 'Редактирование статьи';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статья успешно сохранена');
                return $this->refresh();
            }

        }
        return $this->render('create', compact('model','main_title'));
    }


    public function actionDelete(int $id)
    {
        $model = CreateForm::find()
            ->andWhere(["id" => $id])
            ->one();

        $model->delete();
        $this->goHome();
    }
}
