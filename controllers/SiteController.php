<?php

namespace app\controllers;

use app\search\ArticleSearch;
use app\services\ArticleService;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\web\Controller;
use app\models\Article;

class SiteController extends Controller
{
    /**
     * @var ArticleService $service
     */
    private $service;

    public function __construct(string $id, $module, ArticleService $service)
    {
        parent::__construct($id, $module);
        $this->service = $service;
    }

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


    public function actionIndex(): string
    {
        $searchModel = new ArticleSearch();

        return $this->render('index', ['dataProvider' => $searchModel->search()]);
    }


    public function actionView($id, $about, $title, $text): string
    {
        return $this->render('view',
            [
                'id' => $id,
                'about' => $about,
                'title' => $title,
                'text' => $text
            ]
        );
    }


    /**
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Article();
        $main_title = 'Создание новой статьи';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статья успешно сохранена');
                return $this->refresh();
            }

        }
        return $this->render('create', ['model' => $model, 'main_title' => $main_title]);
    }


    public function actionEdit(int $id)
    {
        $model = $this->service->getArticleModels($id);
        $main_title = 'Редактирование статьи';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статья успешно сохранена');
                return $this->refresh();
            }

        }
        return $this->render('create', compact('model', 'main_title'));
    }


    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete(int $id)
    {
        $model =  $this->service->getArticleModels($id);
        $model->delete();
        $this->goHome();
    }
}
