<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\Book;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div>
    <?php
    if(!$model->isNewRecord) {
        echo '<p>' . Html::a('Αλλαγή Κατάστασης', ['changeorderstatus', 'id' => $model->order_id], [
                'class' => 'btn btn-warning',
                'data' => [
                    'confirm' => 'Είστε σίγουρος ότι θέλετε να αλλάξετε την κατάσταση της παραγγελίας;',
                    'method' => 'post',
                ],
            ]) . '</p>';
    }
    ?>
</div>
<div class="order-form">
    <?php
    if(!$model->isNewRecord) {
        if ($model->order_complete == 0) {
            echo '<div class="alert alert-danger" role="alert">Η παραγγελία βρίσκεται σε αναμονή!</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">Η παραγγελία έχει ολοκληρωθεί!</div>';
        }
    }
    ?>
    <?php $form = ActiveForm::begin(['id' => 'order_form']); ?>
    <div class="row col-sm-12">
        <div class="row col-sm-10">
            <div class="col-sm-5">
                <?= $form->field($model, 'usr_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-5">
                <?= $form->field($model, 'usr_surname')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row col-sm-10">
            <div class="col-sm-5">
                 <?= $form->field($model, 'usr_phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-5">
                <?= $form->field($model, 'usr_email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row col-sm-10">
            <div class="col-sm-5">
                <?= $form->field($model, 'usr_address')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'usr_city')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($model, 'usr_pcode')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row col-sm-10">
            <!--<div class="col-sm-6">-->
                <?php
               // if($model->isNewRecord){
                   //  echo  $form->field($model, 'order_bk_id',['options'=>['class'=>'col-sm-5']])->dropDownList($book_items,['prompt'=>" Επιλογή"]);
                    //$form->field($model->bkCat, 'cat_name',['options'=>['class'=>'col-sm-5']])->dropDownList($categoryList, ['name'=>"select_bookcategory"]);
                    $data = Book::find()
                        ->select(['bk_title as value', 'bk_title as label','bk_id as id'])
                        ->asArray()
                        ->all();
                    echo '<div class="col-sm-6">';
                        echo '<div class=" form-group field-order-order_bk_id required">';
                        echo '<label class="control-label" for="order-order_bk_id">Βιβλίο</label><br>';
                        echo AutoComplete::widget([
                            'name' => 'Order[order_bk_id]',
                            'id' => 'order-order_bk_id_1',
                            'attribute'=>'order_bk_id',
                            'value'=>(!empty($model->order_bk_id) ? $book->bk_title: ''),
                            'options'=>['class'=>'form-control','aria-required'=>"true"],
                            'clientOptions' => [
                                'source' => $data,
                                'autoFill'=>true,
                                'minLength'=>'2',
                                'select' => new JsExpression("function( event, ui ) {
                                     $('#order-order_bk_id').val(ui.item.id);
                                 }")
                            ],
                        ]);
                    echo '<div class="help-block"></div>';
                    echo "</div>";
                    echo Html::ActiveHiddenInput($model,'order_bk_id');
                    //echo $form->field($model, 'order_bk_id')->hiddenInput()->label(false);
                echo "</div>";
               // }else{
               // echo  $form->field($model->orderBk, 'bk_title',['options'=>['class'=>'col-sm-5']])->dropDownList($book_items,['name'=>"Order[order_bk_id]", 'options' => [$model->order_bk_id => ['Selected'=>'selected']]]);
              //  }
                ?>
                  <!--$form->field($book, 'bk_title')->textInput(['maxlength' => true])->label('Βιβλίο') -->
           <!-- </div>-->
        </div>
         <!--//$form->field($model, 'order_date')->textInput()

         //$form->field($model, 'order_comment')->textInput(['maxlength' => true])

        //$form->field($model, 'order_complete')->textInput() -->
        <div class="row col-sm-10">
            <div class="col-sm-6">
                <?= $form->field($model, 'order_admin_comment')->textArea(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-5 form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Αποθήκευση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
