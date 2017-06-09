<?php

namespace app\controllers;


use app\models\Subcategory;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Book;
use app\models\Author;
use app\models\BookCategory;
use app\models\Order;
use app\models\ContactForm;

class AdminController extends Controller
{
    public $layout = 'admin';

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


   /* public function actionIndex()
    {
        return $this->render('index');
    }*/

    /**
     * Login action.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'adminLogin';

        $books=Book::find('*')->count();
        $authors=Author::find()->count();
        $orders=Order::find()->count();
        $categories=BookCategory::find()->all();
        $num_categories=count($categories);
        $completed_orders=Order::find()->where(['order_complete'=>1])->count();
        $uncompleted_orders=Order::find()->where(['order_complete'=>0])->count();

        $books_per_cat=[];
        $i=0;
        foreach($categories as $category):
            $books_per_category=Book::find()->where(['bk_cat_id'=>$category->cat_id])->count();
            $books_per_cat[$i]['cat_name']=$category->cat_name;
            $books_per_cat[$i]['books']=$books_per_category;
            $i++;
        endforeach;

        $subcats_per_cat=[];
        $y=0;
        foreach($categories as $category):
            $subcats_per_category=Subcategory::find()->where(['subcat_cat_id'=>$category->cat_id])->count();
            $subcats_per_cat[$y]['cat_name']=$category->cat_name;
            $subcats_per_cat[$y]['subcats']=$subcats_per_category;
            $y++;
        endforeach;

        $available_books=Book::find()->where(['not',['bk_price'=>null]])->count();
        $no_available_books=Book::find()->where(['bk_price'=>null])->count();

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT bk_title, COUNT(*) c FROM tbl_book GROUP BY bk_title HAVING c > 1");
        $title_duplicate_books = $command->queryAll();
        $count_duplicates=count($title_duplicate_books);
        $d=0;
        foreach($title_duplicate_books as $title_duplicate_book):
            $duplicate_books_models=Book::find()->where(['bk_title'=>$title_duplicate_book['bk_title']])->all();
            $c=0;
            foreach ($duplicate_books_models as $duplicate_books_model):
                $duplicate_books[$d]['bk_title']=$duplicate_books_model->bk_title;
                $duplicate_books[$d]['bk_cat'][$c]=$duplicate_books_model->bkCat['cat_name'];
                $c++;
            endforeach;
            $d++;
        endforeach;


        if (!Yii::$app->user->isGuest) {
           // return $this->goHome();
            $this->layout = 'admin';
            return $this->render('index',
                [
                    'books'=>$books,
                    'authors'=>$authors,
                    'books_per_cat'=>$books_per_cat,
                    'available_books'=>$available_books,
                    'no_available_books'=>$no_available_books,
                    'orders'=>$orders,
                    'completed_orders'=>$completed_orders,
                    'uncompleted_orders'=>$uncompleted_orders,
                    'num_categories'=>$num_categories,
                    'subcats_per_cat'=>$subcats_per_cat,
                    'duplicate_books'=>$duplicate_books,
                    'count_duplicates'=>$count_duplicates,
                ]
            );
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            $this->layout = 'admin';
            return $this->render('index',
                [
                    'books'=>$books,
                    'authors'=>$authors,
                    'books_per_cat'=>$books_per_cat,
                    'available_books'=>$available_books,
                    'no_available_books'=>$no_available_books,
                    'orders'=>$orders,
                    'completed_orders'=>$completed_orders,
                    'uncompleted_orders'=>$uncompleted_orders,
                    'num_categories'=>$num_categories,
                    'subcats_per_cat'=>$subcats_per_cat,
                    'duplicate_books'=>$duplicate_books,
                    'count_duplicates'=>$count_duplicates,
                ]
            );
        }
        return $this->render('login', [
            'model' => $model,
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

       // return $this->goHome();
        $model = new LoginForm();
        $this->layout='adminLogin';
        return $this->render('login', ['model' => $model]);
    }
}
