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
use yii\db\Expression;
use yii\helpers\Url;


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
                Yii::$app->session->setFlash('success', 'H παραγγελία σας καταχωρήθηκε επιτυχώς.');
            } else {
                Yii::$app->session->setFlash('fail', 'Κάποιο σφάλμα προέκυψε. Παρακαλούμε δοκιμάστε ξανά! ');
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
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

    public function actionUsrordermodal()
    {
        if (isset($_POST['bk_id'])) {
            $model = new Order();
            $modal = '<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Φόρμα παραγγελίας</h4>
                    </div>';
            $modal .='<form id="usr_order_form" action="'.Url::to(['site/usrorder', 'id'=>$_POST['bk_id']]).'" method="post">
            <input name="_csrf" value="'.Yii::$app->request->getCsrfToken().'" type="hidden">
                             <div class="modal-body">
                                 <div class="form-group field-order-order_bk_id required">
                                    <input id="order-order_bk_id" class="form-control" name="Order[order_bk_id]" value="'.$_POST['bk_id'].'" type="hidden">
                                    <div class="help-block"></div>
                                 </div>
                                 <span>
                                     <div class="col-sm-6">
                                        <div class="form-group field-order-usr_name required">
                                            <label class="control-label" for="order-usr_name">Όνομα</label>
                                            <input id="order-usr_name" class="form-control" name="Order[usr_name]" maxlength="225" style="width: 100%" aria-required="true" type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group field-order-usr_surname required">
                                            <label class="control-label" for="order-usr_surname">Επώνυμο</label>
                                            <input id="order-usr_surname" class="form-control" name="Order[usr_surname]" maxlength="225" style="width: 100%" aria-required="true" type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                 </span>
                                 <span>
                                    <div class="col-sm-6">
                                        <div class="form-group field-order-usr_phone required">
                                            <label class="control-label" for="order-usr_phone">Τηλέφωνο</label>
                                            <input id="order-usr_phone" class="form-control" name="Order[usr_phone]" style="width: 100%" aria-required="true" type="text">
                                            <div class="help-block"></div>
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group field-order-usr_email required">
                                            <label class="control-label" for="order-usr_email">E-mail</label>
                                            <input id="order-usr_email" class="form-control" name="Order[usr_email]" maxlength="225" style="width: 100%" aria-required="true" type="text">
                                            <div class="help-block"></div>
                                        </div>                        
                                    </div>
                                </span>
                                <span class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group field-order-usr_address">
                                            <label class="control-label" for="order-usr_address">Διεύθυνση</label>
                                            <input id="order-usr_address" class="form-control" name="Order[usr_address]" maxlength="225" style="width: 100%" type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-order-usr_city">
                                            <label class="control-label" for="order-usr_city">Πόλη</label>
                                            <input id="order-usr_city" class="form-control" name="Order[usr_city]" maxlength="225" style="width: 100%" type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group field-order-usr_pcode">
                                            <label class="control-label" for="order-usr_pcode">Τ.Κ.</label>
                                            <input id="order-usr_pcode" class="form-control" name="Order[usr_pcode]" style="width: 100%" type="text">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </span>
                                <span class="row">
                                    <div class="col-sm-12" style="padding-right: 15px; padding-left: 15px;">
                                        <div class="form-group field-order-order_comment">
                                            <label class="control-label" for="order-order_comment">Σχόλιο</label>
                                            <textarea id="order-order_comment" class="form-control" name="Order[order_comment]" maxlength="225"></textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </span>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0; margin-top: 16px">Κλείσιμο</button>
                                <button type="submit" class="btn btn-primary">Αποθήκευση</button>
                             </div>
                        </form>';
            echo $modal;
        }
    }

}
