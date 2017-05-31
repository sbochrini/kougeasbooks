<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\Book;
use app\models\SearchOrder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\helpers\Url;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [ 'index','view','create','update','delete','changeorderstatus','modalcomment','admincomment'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','changeorderstatus','modalcomment','admincomment'],
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            throw new \Exception('You are not allowed to access this page');
                        }
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchOrder();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();
        $book = new Book();
        $book_items=ArrayHelper::map(Book::find()->all(), 'bk_id', 'bk_title');

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->order_complete=0;
            $model->order_date=Yii::$app->formatter->asDate('now','Y-M-d');
            $model->save();
             return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'book' => $book,
                'book_items'=>$book_items,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$model = $this->findModel($id);
        $model =Order::findOne($id);
        $book = Book::findOne(['bk_id'=>$model->order_bk_id]);
        $book_items=ArrayHelper::map(Book::find()->all(), 'bk_id', 'bk_title');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'book' => $book,
                'book_items'=>$book_items,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if(isset($_GET['view']) && $_GET['view']==1){
            return $this->redirect(['index']);
        }else{
            return $this->redirect(Yii::$app->request->referrer);
        }
        //return $this->redirect(['index']);
    }

    public function actionChangeorderstatus($id){
        $model =Order::findOne($id);
        if($model->order_complete==0){
            $model->order_complete=1;
        }else{
            $model->order_complete=0;
        }
        $model->save();
        //return $this->redirect(['index']);
        if(isset($_GET['index'])){
            if(isset($_GET['page']) && (!is_null($_GET['page']) | $_GET['page']!=="")) {
                return $this->redirect(['index',  'page'=>$_GET['page']]);
            }else{
                return $this->redirect(['index']);
            }
        }
        return $this->redirect(['update', 'id' => $id]);
    }

    public function actionAdmincomment($id)
    {
        $model = Order::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(isset($_GET['index'])){
                if(isset($_GET['page']) && (!is_null($_GET['page']) | $_GET['page']!=="")){
                    return $this->redirect(['index', 'page'=>$_GET['page']]);
                }else{
                    return $this->redirect(['index']);
                }
            } else {
                return $this->redirect(['view', 'id' => $model->order_id]);
            }
        }
    }

    public function actionModalcomment()
    {
        if (isset($_POST['order_id'])) {
            $model = Order::findone(['order_id' => $_POST['order_id']]);
            $modal = '<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Προσθήκη σχόλιου</h4>
                    </div>';
            $modal .='<form id="admin_comment_form" action="'.Url::to(['order/admincomment', 'id'=>$model->order_id, 'index'=>$_POST['index'], 'page'=>$_POST['page']]).'" method="post">
            <input name="_csrf" value="'.Yii::$app->request->getCsrfToken().'" type="hidden">
                             <div class="modal-body">
                                <div class="form-group field-order-order_admin_comment">
                                    <label class="control-label" for="order-order_admin_comment">Σχόλιο διαχειριστή</label>
                                    <textarea id="order-order_admin_comment" class="form-control" name="Order[order_admin_comment]" rows="3">'.$model->order_admin_comment.'</textarea>
                                    <div class="help-block"></div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Κλείσιμο</button>
                                <button type="submit" class="btn btn-primary">Αποθήκευση</button>
                             </div>
                        </form>';
            echo $modal;
        }
    }
    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
