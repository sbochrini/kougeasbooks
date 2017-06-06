<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookCategory;
use app\models\Order;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'controllers' => ['book','bookCategory','order'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
    public function actionIndex()
    {
        $this->layout='main_without_catlist';
        $categories = new BookCategory();
        $fav_books =  Book::find()->where(['bk_favorite'=>1])->all();
        return $this->render('index',[
            'categories'=>$categories,
            'fav_books'=>$fav_books,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionBkdetails($id)
    {
        /*$this->layout='main_without_catlist';
        $categories = new BookCategory();*/
        $book =  Book::findOne(['bk_id'=>$id]);
        $order = new Order();
        return $this->render('bkdetails',
            [
                'book'=>$book,
                'order'=>$order,
            ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $this->layout = 'main_without_catlist';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionOrders()
    {
        return $this->render('orders');
    }

    public function actionBookspercat()
    {

        if(Yii::$app->request->get('id')){
            $cat_id = Yii::$app->request->get('id');

            $books= Book::find()
                ->where(['bk_cat_id' => $cat_id])
                ->orderBy('bk_id')
                ->all();
            $category=BookCategory::findOne(['cat_id'=>$cat_id]);

            $dataProvider = new ActiveDataProvider([
                'query' => Book::find()->where(['bk_cat_id' => $cat_id])->orderBy('bk_id DESC'),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('bookspercat',[
                'category'=>$category,
                'books' => $books,
                'dataProvider'=>$dataProvider,
            ]);
        }else return $this->render('error');
    }

    public function actionBookspersubcat()
    {
        if(Yii::$app->request->get('id')){
            $subcat_id = Yii::$app->request->get('id');

            $books= Book::find()
                ->where(['bk_subcat_id' => $subcat_id])
                ->orderBy('bk_id')
                ->all();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find()->where(['bk_subcat_id' => $subcat_id])->orderBy('bk_id DESC'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->renderAjax('bookspersubcat',[
            'books' => $books,
            'dataProvider'=>$dataProvider,
        ]);
    }
    public function actionBookview($id)
    {
        $this->registerJsFile(
            '@web/js/main.js',
            ['depends' => [\yii\web\JqueryAsset::className()]]
        );

        $model=Book::findOne($id);
        $author=$model->bkAuthor;
        return $this->render('bookview', [
            'model' => $model,
            'author' => $author,
        ]);

    }
}
