<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Author;
//use app\models\BookCategory;
use app\models\Subcategory;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use \kartik\widgets\Select2;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use \app\models\Book;


/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
//echo $model->bkAuthor->auth_name;
?>
<?php
   /* $cat_promt=is_null($model->bk_cat_id )? "Επιλογή" : $categoryList[$model->bk_cat_id];
    $cat_value=is_null($model->bk_cat_id) ? null:$model->bk_cat_id;
    $subcat_promt=is_null($model->bk_subcat_id) ? "Επιλογή" : $model->bkSubcat->subcat_name;
    $subcat_value=is_null($model->bk_subcat_id) ? null : $model->bk_subcat_id;
   // print_r($categoryList);*/
?>
<div class="book-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'],
        'id' => 'book_form',
        //'name'=>'book_form'
    ]);

    ?>
    <div class="row col-sm-12">
        <div class="col-sm-4">
            <?php //$img_path = Yii::getAlias('@img').$model->bk_id.".jpg";
            if($model->isNewRecord){
                echo $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*','id' => 'bk_up_img'],
                    'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
                ]);
            }else{
                //$img_path =  Yii::getAlias('@web')."/img/".$model->bk_id.".jpg";
               // echo Html::img($img_path);
                if(is_null($model->bk_image_web_filename) && is_null($model->bk_image_src_filename)){
                    echo $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*','id' => 'bk_up_img'],
                        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
                    ]);
                    echo '<input id="img_check" type="hidden" name="img_check" value="0">';
                }else {
                    echo $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*','id' => 'bk_up_img'],
                        'pluginOptions' => ['
                        allowedFileExtensions' => ['jpg', 'gif', 'png'],
                            'showUpload' => false,
                            'initialPreview' => [
                                Yii::$app->homeUrl. '/img/'.$model->bk_image_web_filename,
                            ],
                            'initialPreviewAsData' => true,
                            'initialCaption' =>  $model->bk_image_src_filename,
                            'initialPreviewConfig' => [
                                ['caption' => $model->bk_image_src_filename, 'size' => 930321, 'width' => "120px", 'key' => 1],
                            ],
                            'maxFileSize' => 2800
                        ],
                    ]);
                    echo '<input id="img_check" type="hidden" name="img_check" value="1">';
                }
            }

            ?>
        </div>
        <div class="col-sm-8">
            <div class="row col-sm-8">
                <?= $form->field($model,'bk_title',['options'=>['class'=>'col-sm-10']])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="row col-sm-8">
                <?php
                //if($model->isNewRecord){
                    $data = Author::find()
                        ->select(['auth_name as value', 'auth_name as  label','auth_id as id'])
                        ->asArray()
                        ->all();
                    echo '<div class="col-sm-10 field-author-auth_name required">';
                    echo '<label class="control-label" for="author-auth_name">Συγγραφέας</label><br>';
                    echo AutoComplete::widget([
                        'name' => 'Author[auth_name]',
                        'id' => 'author-auth_name',
                        'value'=>(!empty($model->bk_author_id) ? $author->auth_name: ''),
                        'options'=>['class'=>'form-control','aria-required'=>"true"],
                        'clientOptions' => [
                            'source' => $data,
                            'autoFill'=>true,
                            'minLength'=>'2',
                            'select' => new JsExpression("function( event, ui ) {
                                 $('#author-auth_name').val(ui.item.id);
                             }")
                        ],
                    ]);
                    echo "</div>";
                    echo '<div class="help-block"></div>';
                    //echo $form->field($author, 'auth_name',['options'=>['class'=>'col-sm-10']])->textInput(['maxlength' => true]);
                /*}else{
                    echo $form->field($author, 'auth_name',['options'=>['class'=>'col-sm-10']])->textInput(['maxlength' => true]);
                   // echo $form->field($model->bkAuthor, 'auth_name',['options'=>['class'=>'col-sm-10']])->textInput(['maxlength' => true]);
                }*/
                ?>

            </div>
        </div>
    </div>

    <div class="row col-sm-8">
        <?php
        if($model->isNewRecord){
            echo  $form->field($model, 'bk_cat_id',['options'=>['class'=>'col-sm-5']])->dropDownList($categoryList,['prompt'=>" Επιλογή"]);
            //$form->field($model->bkCat, 'cat_name',['options'=>['class'=>'col-sm-5']])->dropDownList($categoryList, ['name'=>"select_bookcategory"]);
        }else{
            echo  $form->field($model->bkCat, 'cat_name',['options'=>['class'=>'col-sm-5']])->dropDownList($categoryList,['name'=>"select_book", 'options' => [$model->bk_cat_id => ['Selected'=>'selected']]]);
        }
        ?>

        <?php
        if($model->isNewRecord){
           // echo $form->field($model, 'bk_subcat_id',['options'=>['class'=>'col-sm-4']])->dropDownList($subcategoryList,['prompt'=>" Επιλογή----"]);
            echo $form->field($model, 'bk_subcat_id',['options'=>['class'=>'col-sm-4']])->widget(DepDrop::classname(), [
                'pluginOptions'=>[
                    'depends'=>['book-bk_cat_id'],
                    'placeholder' => 'Επιλογή',
                    'url' => Url::to(['/book/subcat'])
                ]
            ]);
        }else{
            //if(!is_null($model->bk_subcat_id)){
                $subcategories = Subcategory::find()->where(['subcat_cat_id'=>$model->bk_cat_id])->all();
                $subcategoryList=ArrayHelper::map($subcategories,'subcat_id','subcat_name');
               // echo $form->field($model->bkSubcat, 'subcat_name',['options'=>['class'=>'col-sm-4']])->dropDownList($subcategoryList, ['name'=>"select_booksubcategory",'options' => [$model->bk_subcat_id => ['Selected'=>'selected']]]);
                echo $form->field($model, 'bk_subcat_id',['options'=>['class'=>'col-sm-6']])->widget(DepDrop::classname(), [
                    'data'=>$subcategoryList,
                    'type' => DepDrop::TYPE_SELECT2,
                    //'options'=>['id'=>'bk_cddsubcat_id'],
                    'pluginOptions'=>[
                        'depends'=>['bookcategory-cat_name'],
                        'selected'=>[$model->bk_subcat_id],
                        'placeholder' => 'Επιλογή',
                        'url' => Url::to(['/book/subcat'])
                    ]
                ]);
            //}
        }

        //$form->field($model, 'bk_subcat_id')->dropDownList($subcategoryList, ['value'=>$subcat_value,'prompt'=>$subcat_promt ])
        ?>

    </div>
    <div class="help-block"></div>
    <div class="row col-sm-8">
        <?= $form->field($model, 'bk_publisher',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bk_pb_place',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bk_pb_year',['options'=>['class'=>'col-sm-2']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row col-sm-8">
        <?= $form->field($model, 'bk_pages',['options'=>['class'=>'col-sm-2']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bk_price',['options'=>['class'=>'col-sm-2']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row col-sm-8">
        <?= $form->field($model, 'bk_description',['options'=>['class'=>'col-sm-6']])->textArea(['rows' => 6]) ?>
    </div>
    <div class="row col-sm-8">
         <?= $form->field($model, 'bk_condition',['options'=>['class'=>'col-sm-6']])->textInput(['rows' => 6]) ?>
    </div>
    <div class="row col-sm-8">
<!--       $form->field($model, 'bk_grouping',['options'=>['class'=>'col-sm-6']])->textInput(['maxlength' => true]) -->
        <?php
            $data = Book::find()
                ->select(['bk_grouping as value'])
                ->asArray()
                ->all();
            echo '<div class="col-sm-6 field-book-bk_grouping">';
            echo '<label class="control-label" for="book-bk_grouping">Ομαδοποίηση</label><br>';
            echo AutoComplete::widget([
                'name' => 'Book[bk_grouping]',
                'id' => 'book-bk_grouping',
                'value'=>(!empty($model->bk_grouping) ? $model->bk_grouping: ''),
                'options'=>['class'=>'form-control'],
                'clientOptions' => [
                    'source' => $data,
                    'autoFill'=>true,
                    'minLength'=>'2',
                    'select' => new JsExpression("function( event, ui ) {
                                     $('#book-bk_grouping').val(ui.item.id);
                                 }")
                ],
            ]);
            echo "</div>";
            echo '<div class="help-block"></div>';
        ?>
    </div>

    <div class="form-group">
        <div class="row col-sm-8" style="padding: 2%;">
            <?php
            if($model->isNewRecord ){
               echo Html::submitButton('Δημιουργία', ['class' =>  'btn btn-success', 'id'=>'btn_bk_create']);
            }else{
                echo Html::submitButton('Αποθήκευση', ['class' =>  'btn btn-primary', 'id'=>'btn_bk_update']);
            }
            // Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Αποθήκευση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
                ?>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script  type="text/javascript">
    //$("#author-auth_name").addClass({"class": "form-control"});
    document.getElementById("btn_bk_update").onclick = function() {checkImageFunction()};

    function checkImageFunction() {
        if($('div.file-preview :visible')){
            var caption = document.getElementsByClassName('file-caption-name')[0];
            var title=caption.getAttribute("title");
            var file=document.getElementById('bk_up_img');
            console.log(file.name);

           // alert("filename"+file.name);
            console.log(file.value);
            if(title!==""){
                $("#img_check").val(1);
            }else{$("#img_check").val(0);}
            //alert(title);
        } /*if($('div.file-preview :hidden')){
            $("#img_check").val(0);
        }*/
    }
</script>