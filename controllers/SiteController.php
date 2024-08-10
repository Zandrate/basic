<?php

namespace app\controllers;

use app\filter\CategoryFilter;
use app\search\ArticleSearch;
use app\services\ArticleService;
use app\services\CategoryService;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\web\Controller;
use app\models\Article;
use app\models\Category;
use app\models\Junction;

class SiteController extends Controller
{
    /**
     * @var ArticleService $articleService
     * @var CategoryService $categoryService
     */
    private $articleService;
    private CategoryService $categoryService;

    public function __construct(string $id, $module, ArticleService $articleService, CategoryService $categoryService)
    {
        parent::__construct($id, $module);
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
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
        $data_category =$this->categoryService->getCategory();;

        return $this->render('index',
            [
                'dataProvider' => $searchModel->search(),
                'data_category' => $data_category,
            ]);
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
        return $this->render('create',
            [
                'model' => $model,
                'main_title' => $main_title
            ]);
    }


    public function actionEdit(int $id)
    {
        $model = $this->articleService->getArticleModels($id);
        $main_title = 'Редактирование статьи';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статья успешно сохранена');
                return $this->refresh();
            }

        }
        return $this->render('create',
            [
                'model' => $model,
                'main_title' => $main_title
            ]);
    }


    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete(int $id)
    {
        $model = $this->articleService->getArticleModels($id);
        $model->delete();
        $this->goHome();
    }


    public function actionFiltering(int $tag_id)
    {
        $model = $this->categoryService->getJunction($tag_id);
        $filter_model = new CategoryFilter();
        $data_category = $this->categoryService->getCategory();
        return $this->render('index',
            [
                'dataProvider' => $filter_model->filter_article($model),
                'data_category' => $data_category,
            ]);


    }

}
