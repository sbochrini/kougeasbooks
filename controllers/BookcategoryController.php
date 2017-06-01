<?php

namespace app\controllers;

use app\models\Subcategory;
use Yii;
use app\models\BookCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * BookCategoryController implements the CRUD actions for BookCategory model.
 */
class BookcategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => [ 'index','view','create','update','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete'],
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            throw new \Exception('You are not allowed to access this page');
                        }
                    ],

                ],
            ],
        ];
    }

    /**
     * Lists all BookCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new SearchBookCategoery();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = BookCategory::find();
        //$query->joinWith('subcategories',"INNER JOIN");
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $html=[];
        $cats=BookCategory::find()->all();
        foreach($cats as $cat):
            $subcats=Subcategory::find()->where(['subcat_cat_id'=>$cat->cat_id])->all();
            if($cat->cat_subcat==1){
                $ul='<ol>';
                foreach($subcats as $subcat):
                    $ul.='<li><strong>'.$subcat->subcat_name.'</strong></li>';
                endforeach;
                $ul.="</ol>";
                $html[$cat->cat_id]=$ul;
            }else{
                $html[$cat->cat_id]="";
            }
        endforeach;

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'html' => $html,
        ]);
    }

    /**
     * Displays a single BookCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $subcat_items=ArrayHelper::map(SubCategory::find()->where(['subcat_cat_id'=>$id])->all(), 'subcat_id', 'subcat_name');
        return $this->render('view', [
            'model' => $this->findModel($id),
            'subcat_items'=>$subcat_items,
        ]);

    }

    /**
     * Creates a new BookCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BookCategory();
        $subcat = new Subcategory();

        if(Yii::$app->request->post()){
            $model->cat_name=$_POST['BookCategory']['cat_name'];
            if(isset($_POST['BookCategory']['subcat'])){
                if($_POST['BookCategory']['subcat']!==""){
                    $subcat->subcat_name=$_POST['BookCategory']['subcat'];
                    $model->cat_subcat=1;
                    $model->save();
                    $subcat->subcat_cat_id=$model->cat_id;
                    $subcat->save();
                }else{
                    $model->cat_subcat=0;
                    $model->save();
                }

                if(isset($_POST['BookCategory']['subcats'])){
                    for($i=0; $i<count($_POST['BookCategory']['subcats']); $i++){
                        $subcat = new Subcategory();
                        $subcat->subcat_name=$_POST['BookCategory']['subcats'][$i];
                        $subcat->subcat_cat_id=$model->cat_id;
                        $subcat->save();
                        $model->cat_subcat=1;
                        $model->save();
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->cat_id]);
        }
       /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cat_id]);
        }*/
        else {
            return $this->render('create', [
                'model' => $model,
                'subcat'=>$subcat,
            ]);
        }
    }

    /**
     * Updates an existing BookCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $has_subcats=0;
        if($model->cat_subcat==1){
            $subcats = Subcategory::find()->where(['subcat_cat_id'=>$id])->all();
            $has_subcats=count($subcats);
        }else{
            $subcats=null;
        }

        if (Yii::$app->request->post()){
            $model->cat_name = $_POST['BookCategory']['cat_name'];
            if(count($subcats)>0){
                foreach($subcats as $subcat):
                    if(isset($_POST['BookCategory']['subcat'][$subcat->subcat_id]) && !is_null($_POST['BookCategory']['subcat'][$subcat->subcat_id])){
                        $subcat->subcat_name=$_POST['BookCategory']['subcat'][$subcat->subcat_id];
                        $subcat->save();
                    }else{
                        $has_subcats--;
                        $subcat->delete();
                    }
                endforeach;
                //$model->save();
            }else{
                if(isset($_POST['BookCategory']['subcat']) && !is_null($_POST['BookCategory']['subcat'])){
                  //  $model->save();
                    $subcat = new Subcategory();
                    $subcat->subcat_name=$_POST['BookCategory']['subcat'];
                    $subcat->subcat_cat_id=$model->cat_id;
                    $subcat->save();
                    $has_subcats++;
                }
            }
            $model->save();
            if(isset($_POST['BookCategory']['new_subcats'])){
                end($_POST['BookCategory']['new_subcats']);         // move the internal pointer to the end of the array
                $key = key($_POST['BookCategory']['new_subcats']);
                for($i=0; $i<=$key; $i++){
                    if(isset($_POST['BookCategory']['new_subcats'][$i]) && !is_null($_POST['BookCategory']['new_subcats'][$i])){
                        $new_subcat= new Subcategory();
                        $new_subcat->subcat_name=$_POST['BookCategory']['new_subcats'][$i];
                        $new_subcat->subcat_cat_id=$model->cat_id;
                        $new_subcat->save();

                        $has_subcats++;
                    }
                }
            }
            if( $has_subcats<=0){
                $model->cat_subcat=0;
                $model->save();
            }else{
                $model->cat_subcat=1;
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->cat_id]);
        }else {
            return $this->render('update', [
                'model' => $model,
                'subcats'=>$subcats,
            ]);
        }
    }

    /**
     * Deletes an existing BookCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        /*if($model->cat_subcat==1){
            $subcats = Subcategory::find()->where(['subcat_cat_id'=>$id])->delete();
        }*/
        if(isset($_GET['view']) && $_GET['view']==1){
            return $this->redirect(['index']);
        }else{
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    /**
     * Finds the BookCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
