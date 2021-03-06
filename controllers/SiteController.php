<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use app\models\BookCategory;
use app\models\Order;
use app\models\Subcategory;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\widgets\ActiveForm;
use \app\models\BookSearch;


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
       // $this->layout='main_without_catlist';
        $order = new Order();
        $categories = new BookCategory();
        $fav_books =  Book::find()->where(['bk_favorite'=>1])->orderBy([new Expression('ISNULL(bk_grouping ),bk_grouping ASC')])->all();
        return $this->render('index',[
            'categories'=>$categories,
            'fav_books'=>$fav_books,
            'order'=>$order,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    /*public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('admin/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('admin/login', [
            'model' => $model,
        ]);
       return $this->redirect(Url::toRoute('admin/login'));
    }*/


    public function actionBkdetails($id)
    {
        /*$this->layout='main_without_catlist';
        $categories = new BookCategory();*/
        $book =  Book::findOne(['bk_id'=>$id]);
        $order = new Order();
        $recommended_books=Book::find()->where(['bk_grouping'=>$book->bk_grouping] and ['not',['bk_id'=>$book->bk_id]])->orderBy(new Expression('rand()'))->limit(3)->all();
        $auth_recommended_books=Book::find()->where(['bk_author_id'=>$book->bk_author_id])->orderBy(new Expression('rand()'))->limit(3)->all();
        $cat_recommended_books=Book::find()->where(['bk_cat_id'=>$book->bk_cat_id])->orderBy(new Expression('rand()'))->limit(3)->all();
        return $this->render('bkdetails',
            [
                'book'=>$book,
                'order'=>$order,
                'recommended_books'=>$recommended_books,
                'auth_recommended_books'=>$auth_recommended_books,
                'cat_recommended_books'=>$cat_recommended_books,
            ]);
    }

    public function actionUsrorder()
    {
        $model = new Order();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->order_complete = 0;
            $model->order_date = Yii::$app->formatter->asDate('now', 'Y-M-d');
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Σύντομα θα επικοινωνήσουμε μαζί σας σχετικά με τον τρόπο παραλαβής της.');
            } else {
                Yii::$app->session->setFlash('fail', 'Παρακαλούμε δοκιμάστε ξανά συμπληρώνοντας όλα τα υποχρεωτικά πεδία.');
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * Logout action.
     *
     * @return string
     */
   /* public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }*/

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
            Yii::$app->mailer->compose()
                ->setFrom([$model->email => $model->name])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject($model->subject)
                ->setTextBody($model->body)
                ->send();
            /*ini_set("SMTP","ssl://smtp.gmail.com");
            ini_set("smtp_port","465");
           $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: '.$model->name.' <'.$model->email .'>'. "\r\n";*/
           // mail(Yii::$app->params['adminEmail'],$model->subject,$model->body,$headers);
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
            $order=new Order();
            $cat_id = Yii::$app->request->get('id');
            $books= Book::find()
                ->where(['bk_cat_id' => $cat_id])
                ->orderBy([new Expression('ISNULL(bk_grouping),bk_grouping ASC')])
                ->all();
            $category=BookCategory::findOne(['cat_id'=>$cat_id]);
            /* $dataProvider = new ActiveDataProvider([
                 'query' => Book::find()->where(['bk_cat_id' => $cat_id])->orderBy('bk_id DESC'),
                 'pagination' => [
                     'pageSize' => 20,
                 ],
             ]);*/
            return $this->render('bookspercat',[
                'category'=>$category,
                'books' => $books,
                'order'=>$order,
            ]);
        }else return $this->render('error');
    }

    /*public function actionBookspercatwith()
    {
        if(Yii::$app->request->get('id')){
            $cat_id = Yii::$app->request->get('id');
            $books= Book::find()
                ->where(['bk_cat_id' => $cat_id])
                ->orderBy('bk_grouping')
                ->all();
            $category=BookCategory::findOne(['cat_id'=>$cat_id]);
            return $this->renderAjax('bookspercat',[
                'category'=>$category,
                'books' => $books,
            ]);
        }else return $this->renderAjax('error');
    }*/


    public function actionBookspersubcat()
    {
        if(Yii::$app->request->get('id')){
            $order = new Order();
            $subcat_id = Yii::$app->request->get('id');
            $subcategory=Subcategory::findOne(['subcat_id'=>$subcat_id]);
            $books= Book::find()
                ->where(['bk_subcat_id' => $subcat_id])
                ->orderBy([new Expression('ISNULL(bk_grouping ),bk_grouping ASC')])
                ->all();
        }
        return $this->render('bookspersubcat',[
            'books' => $books,
            'subcategory'=>$subcategory,
            'order'=>$order,
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

    public function actionUsrordermodal()
    {
        if (isset($_POST['bk_id'])) {
            $order = new Order();
            $modal="";
            $form = ActiveForm::begin(
                [
                    'id' => 'usr_index_order_form',
                    'action'=> ['site/usrindexorder'],
                    'method' => 'post',
                ]);
            $modal.=$form->field($order, 'order_bk_id')->hiddenInput(['value'=> $_POST['bk_id']])->label(false);
            echo $modal;
        }
    }

    public function actionUsrindexorder()
    {
        $model = new Order();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->order_complete = 0;
            $model->order_date = Yii::$app->formatter->asDate('now', 'Y-M-d');
            if ($model->save()) {
                Yii::$app->session->setFlash('indexsuccess', 'Σύντομα θα επικοινωνήσουμε μαζί σας σχετικά με τον τρόπο παραλαβής της.');
            } else {
                Yii::$app->session->setFlash('indexfail', 'Παρακαλούμε δοκιμάστε ξανά συμπληρώνοντας όλα τα υποχρεωτικά πεδία. ');
            }
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    function actionAuthorcatalog(){
        $gr=array('Α','Β','Γ','Δ','Ε','Ζ','Η','Θ','Ι','Κ','Λ','Μ','Ν','Ξ','Ο','Π','Ρ','Σ','Τ','Υ','Φ','Χ','Ψ','Ω');
        if(Yii::$app->request->get('letter')){
            /*$q_search=Author::find()->where(['like', 'auth_name',$_GET['letter'].'%',false]);*/
            if(Yii::$app->request->get('letter')=='all_en' || Yii::$app->request->get('letter')=="all_gr"){
                $dataProvider = new ActiveDataProvider([
                    'query' => Author::find()->orderby('auth_name'),
                    'pagination' => [
                        'pageSize' => 30,
                    ],
                ]);
            }else{
                $q_search= new Query();
                $q_search->select(['auth_id', 'auth_name'])->from('tbl_author')->where(['like', 'auth_name',$_GET['letter'].'%',false])->orderby('auth_name')->all();
                $dataProvider = new ActiveDataProvider([
                    'query' =>$q_search ,
                    'pagination' => [
                        'pageSize' => 30,
                    ],
                ]);
            }
            /*$list=ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '@app/views/site/_bookslistperauthor',
                'summary' => "Εμφάνιση {begin} - {end} από {totalCount} συγγραφείς.",
            ]);
            echo $list;*/
            return $this->render('authorcatalog', [
                //'all_authors' => $all_authors,
                'dataProvider'=>$dataProvider,
                'gr'=>$gr
            ]);
        }else{
            $dataProvider = new ActiveDataProvider([
                'query' => Author::find()->orderby('auth_name'),
                'pagination' => [
                    'pageSize' => 30,
                ],
            ]);
            return $this->render('authorcatalog', [
                //'all_authors' => $all_authors,
                'dataProvider'=>$dataProvider,
                'gr'=>$gr
            ]);
        }

    }

    function actionBooksperauthor(){
        if(Yii::$app->request->get('auth_id')){
            $auth_id = Yii::$app->request->get('auth_id');
            $order= new Order();
            $books= Book::find()
                ->where(['bk_author_id' => $auth_id])
                ->orderBy([new Expression('ISNULL(bk_grouping ),bk_grouping ASC')])
                ->all();
            $author=Author::findOne(['auth_id'=>$auth_id]);
            return $this->render('booksperauthor',[
                'author' => $author,
                'books' => $books,
                'order'=>$order,
            ]);
        }else return $this->render('error');
    }

    function actionBooksearch(){
        $order= new Order();
        $searchstring = $_GET['BookSearch']['generalsearch'];
        $searchModel = new BookSearch();
        $results= $searchModel->generalsearch($searchstring);
        return $this->render('booksearchresults', [
            'searchModel' => $searchModel,
            'results' => $results,
            'order'=>$order,
        ]);
    }

}
