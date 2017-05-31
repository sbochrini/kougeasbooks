<?php

namespace app\controllers;



use Yii;
use app\models\Book;
use app\models\BookSearch;
use app\models\BookCategory;
use app\models\Subcategory;
use app\models\Author;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\Html;


/**
 * BookController implements the CRUD actions for Book model....
 */
class BookController extends Controller
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
                'only' => [ 'index','view','create','update','delete','subcat'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','subcat'],
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            Yii::$app->session->setFlash('key', 'Value');
                            //Redirect
                            return $action->controller->redirect('action');
                           // throw new \Exception('You are not allowed to access this page');
                        }
                    ],
                    [
                        'allow' => false, // Do not have access
                        'roles'=>['?'], // Guests '?'
                    ],

                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $checked_cats=null;
        $checked_groupings=null;
        $checked_subcats=null;
        $model = new Book();
        $cat=new BookCategory();
        $cats=BookCategory::find()->all();
        $cat_items=ArrayHelper::map($cats, 'cat_id', 'cat_name');
        //$bk_grouping_items=ArrayHelper::map(Book::find()->where(['not',['bk_grouping'=>null]])->all(), 'bk_grouping', 'bk_grouping');

        //$bk_grouping_items=Book::find()->select('*')->groupBy('bk_grouping')->where(['not',['bk_grouping'=>null]])->all();
        /*foreach($arr_ids as $id):
            $ids[]["id"]=$id->bk_cat_id;
        endforeach;*/
       // $categories=BookCategory::find()->all();
        if(empty($_POST['BookCategory']['cat_id']) && empty($_POST['Book']['bk_subcat_id'])){         //empty($_POST['Book']['bk_grouping'])
            $searchModel = new BookSearch();
            if(isset($_GET['BookSearch']['bk_cat_id']) && isset($_GET['BookSearch']['bk_subcat_id'])){
                if(!empty($_GET['BookSearch']['bk_cat_id'])){
                    $checked_cats=explode(",",$_GET['BookSearch']['bk_cat_id']);
                    $searchModel->cat_id=explode(",",$_GET['BookSearch']['bk_cat_id']);
                }
                if(!empty($_POST['Book']['bk_subcat_id'])){
                    $checked_subcats=explode(",",$_GET['BookSearch']['bk_subcat_id']);
                    $searchModel->ch_bk_subcats=explode(",",$_GET['BookSearch']['bk_subcat_id']);
                }
                //$searchModel->ch_bk_subcats=explode(",",$_GET['BookSearch']['bk_subcat_id']);
            }
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }else{
            $searchModel = new BookSearch();
           if(isset($_POST['BookCategory']['cat_id'])){
               $searchModel->cat_id=$_POST['BookCategory']['cat_id'];
           }
            if(isset($_POST['Book']['bk_subcat_id'])){
                $searchModel->ch_bk_subcats=$_POST['Book']['bk_subcat_id'];
            }
            //$searchModel->ch_bk_grouping=$_POST['Book']['bk_grouping'];
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            if(!empty($_POST['BookCategory']['cat_id'])){
                foreach($_POST['BookCategory']['cat_id'] as $key=>$value):
                    $checked_cats[]=$value;
                endforeach;
            }
            if(!empty($_POST['Book']['bk_subcat_id'])){
                foreach($_POST['Book']['bk_subcat_id'] as $key=>$value):
                    $checked_subcats[]=$value;
                endforeach;
            }
        }

       /* $query = Book::find();
        // Important: lets join the query with our previously mentioned relations
        // I do not make any other configuration like aliases or whatever, feel free
        // to investigate that your self
        $query->joinWith(['bk_author_id', 'country']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);*/
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'cat_items'=>$cat_items,
           // 'bk_grouping_items'=>$bk_grouping_items,
            'cat'=>$cat,
            'cats'=>$cats,
            'checked_cats'=>$checked_cats,
            'checked_subcats'=>$checked_subcats,
            //'checked_groupings'=>$checked_groupings,
            //'ids'=>$ids,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
       $model=Book::findOne($id);
        $author=$model->bkAuthor;
        return $this->render('view', [
            'model' => $model,
            'author' => $author,
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Book();
        $author = new Author();
        $categories = BookCategory::find()->all();
        $categoryList=ArrayHelper::map($categories,'cat_id','cat_name');

        $subcategories = Subcategory::find()->all();
        $subcategoryList=ArrayHelper::map($subcategories,'subcat_id','subcat_name');

       /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bk_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categoryList' => $categoryList,
                'subcategoryList'=>$subcategoryList,
            ]);
        }*/
        if ($model->load(Yii::$app->request->post())) {
            if(isset($_POST['Author'])){
                $existed_author=Author::findOne(['auth_name'=>$_POST['Author']]);
                if(is_object($existed_author)){
                    $model->bk_author_id= $existed_author->auth_id;
                }else{
                    $author->attributes=$_POST['Author'];
                    $author->save();
                    $model->bk_author_id= $author->auth_id;
                }
            }else{
                $model->bk_author_id=BOOK::NO_AUTHOR;
            }
            $image = UploadedFile::getInstance($model, 'image');

            //$image = UploadedFile::getInstanceByName($_POST['Book']['bk_image_src_filename']);
            if (!is_null($image)) {
                $model->bk_image_src_filename = $image->name;
                $explode=explode(".", $image->name);
                $ext = end($explode);
                // generate a unique file name to prevent duplicate filenames
                $model->bk_image_web_filename = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                //Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/img/';
                $path = Yii::$app->params['uploadPath'] . $model->bk_image_web_filename;
                $image->saveAs($path);
            }
            if ($model->save()) {
               // $image->saveAs($path);
                return $this->redirect(['view', 'id' => $model->bk_id]);
            }  else {
                var_dump ($model->getErrors()); die();
            }
        }
        return $this->render('create', [
            'model' => $model,
            'author'=>$author,
            'categoryList' => $categoryList,
            'subcategoryList'=>$subcategoryList,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       //$model = $this->findModel($id);
        $model = Book::findOne($id);
        if(is_null($model->bk_author_id))
            $author= new Author();
        else
            $author = Author::findOne($model->bk_author_id);

        $categories = BookCategory::find()->all();
        $categoryList=ArrayHelper::map($categories,'cat_id','cat_name');

        $subcategories = Subcategory::find()->all();
        $subcategoryList=ArrayHelper::map($subcategories,'subcat_id','subcat_name');

        if ($model->load(Yii::$app->request->post())) {
            $model=Book::find()->where(['bk_id' => $id])->one();

            if(isset($_POST['Author'])){
                $author->attributes=$_POST['Author'];
                $author->save();
                $model->bk_author_id= $author->auth_id;
            }else{
                $model->bk_author_id=BOOK::NO_AUTHOR;
            }
            $image = UploadedFile::getInstance($model, 'image');
            if(!is_null($image)){

                $model->bk_image_src_filename = $image->name;
                $explode=explode(".", $image->name);
                $ext = end($explode);
                $model->bk_image_web_filename = Yii::$app->security->generateRandomString().".{$ext}";
                $path = Yii::$app->params['uploadPath'] . $model->bk_image_web_filename;
                $image->saveAs($path);
            }elseif(is_null($image) && $_POST['img_check']==0){
                $model->bk_image_src_filename=null;
                $model->bk_image_web_filename=null;
            }


            $model->bk_title=$_POST['Book']['bk_title'];



            if(isset($_POST['Book']['bk_subcat_id']))
                $model->bk_subcat_id=$_POST['Book']['bk_subcat_id'];
            else
                $model->bk_subcat_id=null;

            $model->bk_cat_id=$_POST['select_book'];
            $model->bk_condition=$_POST['Book']['bk_condition'];
            $model->bk_grouping=$_POST['Book']['bk_grouping'];
            $model->bk_pages=$_POST['Book']['bk_pages'];
            $model->bk_publisher=$_POST['Book']['bk_publisher'];
            $model->bk_pb_place=$_POST['Book']['bk_pb_place'];
            $model->bk_pb_year=$_POST['Book']['bk_pb_year'];
            $model->bk_price=$_POST['Book']['bk_price'];
            $model->bk_description=$_POST['Book']['bk_description'];

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->bk_id]);
            }else{
                var_dump ($model->getErrors()); die();
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'author' => $author,
                'categoryList' => $categoryList,
                'subcategoryList'=>$subcategoryList,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=Book::findOne($id);
        if ($model->bk_image_web_filename!='') {
            $img_path=Yii::$app->basePath. '\web\img\\'.$model->bk_image_web_filename;
            unlink($img_path);
        }
        $model->delete();
        //$this->findModel($id)->delete();
        if(isset($_GET['view']) && $_GET['view']==1){
            return $this->redirect(['index']);
        }else{
            return $this->redirect(Yii::$app->request->referrer);
        }

    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionSubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
               // $cat_id =int($cat_id);
                $subcategories = Subcategory::find()->where(['subcat_cat_id' => $cat_id])->all();
                if($subcategories){
                    $out=[];
                    foreach($subcategories as $subcategory){
                        $out[]=['id'=>$subcategory->subcat_id,'name'=>$subcategory->subcat_name];
                    }
                    // $out=ArrayHelper::map($subcategories,'subcat_id','subcat_name');
                    // the getSubCatList function will query the database based on the
                    // cat_id and return an array like below:
                    // [
                    // ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                    // ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                    // ]
                    echo Json::encode(['output'=>$out, 'selected'=>'']);
                    return;
                }//else{
               //     echo Json::encode(['output'=>'','loading'=>false,'placeholder'=>"Δεν υπάρχει υποκατηγορία", 'disabled'=>'disabled']);
               // }

            }

        }
        echo Json::encode(['output'=>'','disabled'=>'disabled','placeholder'=>""]);
    }

    public function actionSubcatcheckboxes($cat_id){
        $subcats=Subcategory::find()->where(['subcat_cat_id'=>$cat_id])->all();
        if(count($subcats)>0){
            $html= '<div class=" field-book-bk_subcat_id">'; //form-group
            //$html.= '<label class="control-label">Ομαδοποίηση</label>';
            //$html.='<input name="Book[bk_subcat_id]" value="" type="hidden">';
            $html.= '<div id="book-bk_subcat_id">';
            foreach($subcats as $subcat):
                $checked="";
               /* if(!is_null($checked_subcats) && in_array($subcat->subcat_id, $checked_subcats)){
                    $checked="checked";
                }*/
                $html.= '<label><input id="subcat_'.$subcat->subcat_id.'" name="Book[bk_subcat_id][]" value="'.$subcat->subcat_id.'" type="checkbox"> '.$subcat->subcat_name.'</label><br>';
            endforeach;
            $html.= '</div>'; //d="book-bk_grouping"
            $html.= '<div class="help-block"></div>';
            $html.= '</div>'; //field-book-bk_grouping
            //$html.= Html::submitButton('Ανανέωση', ['class' =>  'btn btn-info', 'id'=>'update_booklist']);
            echo  $html;
        }else{
            return null;
        }

    }

    public function actionFavorite($bk_id){
        $model =Book::findOne($bk_id);
        $model->bk_favorite=$_GET['favorite'];
        $model->save();
        //return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
    }

    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
