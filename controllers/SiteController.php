<?php

namespace app\controllers;

use app\filter\CategoryFilter;
use app\models\Category;
use app\models\Junction;
use app\search\ArticleSearch;
use app\services\ArticleService;
use app\services\CategoryService;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\web\Controller;
use app\models\Article;

class SiteController extends Controller
{
    private string $text_article;
    private string $text_category;

    /**
     * @var ArticleService $articleService
     */
    private ArticleService $articleService;


    /**
     * @var CategoryService $categoryService
     */
    private CategoryService $categoryService;

    public function __construct(string $id, $module, ArticleService $articleService, CategoryService $categoryService)
    {
        parent::__construct($id, $module);
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        $this->text_article = 'Статья успешно сохранена';
        $this->text_category = 'Тег успешно сохранен';
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
        $data_category = $this->categoryService->getCategory();

        return $this->render('index',
            [
                'dataProvider' => $searchModel->search(),
                'data_category' => $data_category,
            ]);
    }


    public function actionView($id, $about, $title, $text): string
    {
        $junction = $this->categoryService->getJunctionId($id);
        $category = $this->categoryService->getArrayCategory($junction);


        return $this->render('view',
            [
                'id' => $id,
                'about' => $about,
                'title' => $title,
                'text' => $text,
                'category' => $this->categoryService->getFiltrTitleCategory($category),
            ]
        );
    }


    /**
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Article();
        $junction = new Junction();
        $main_title = 'Создание новой статьи';

        if ($model->load(Yii::$app->request->post()) and $junction->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $junction->id_article = $model->id;
                if ($junction->save()) {
                    Yii::$app->session
                        ->setFlash('success', $this->text_article);
                    return $this->refresh();
                }
            }


        }
        return $this->render('create',
            [
                'model' => $model,
                'main_title' => $main_title,
                'title_category' => $this->categoryService->getTitleCategory(),
                'junction' => $junction
            ]);
    }


    public function actionEdit(int $id)
    {
        $model = $this->articleService->getArticleModels($id);
        $main_title = 'Редактирование статьи';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session
                    ->setFlash('success', $this->text_article);
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

    public function actionCreateCategory()
    {
        $model = new Category();
        $main_title = 'Создание тега';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session
                    ->setFlash('success', $this->text_category);
                return $this->refresh();
            }

        }
        return $this->render('create_category',
            [
                'model' => $model,
                'main_title' => $main_title
            ]);
    }

    public function actionGiveTag(int $id_article)
    {
        $model = new Junction();
        $model_article = $this->articleService->getArticleModels($id_article);
        $model->id_article = $model_article->id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session
                    ->setFlash('success', $this->text_category);
                return $this->refresh();
            }
        }

        return $this->render('give_tag',
            [
                'model' => $model,
                'title_category' => $this->categoryService->getTitleCategory(),
                'title' => $model_article->title


            ]);


    }

}
