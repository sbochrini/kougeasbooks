<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

     <!--//$form->field($model, 'cat_subcat')->textInput(['maxlength' => true])-->

    <?php
    if($model->isNewRecord){
        echo '<div class="row"><div class="col-sm-10">';
        echo $form->field($model, 'subcat')->textInput(['maxlength' => true]);
        echo '</div>';
        echo '<div class="col-sm-2"><div><button type="button" id="add_subcat" class="btn btn-info btn-xs"><i class="fa fa-plus-square-o " aria-hidden="true"></i> Προσθήκη</button></div></div>';
        echo '</div>';
        echo '<div class="row"><div class="col-sm-10">';
        echo '<div id="add_inputs_container"></div>';
        echo '</div>';
        // echo '<div class="col-sm-2"><div style="padding-top: 50%;"><button id="add_subcat"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i></button></div></div>';
        echo '</div>';
    }else{
        if($model->cat_subcat==1) {
            echo '<div class="row"><div class="col-sm-10">';
            echo '<div class="form-group field-bookcategory-subcat">';
            echo '<label class="control-label" for="bookcategory-subcat">Υποκατηγορία/ες</label>';
            foreach($subcats as $subcat):
                echo '<div class="row"> <div class="col-sm-11"><input id="bookcategory-subcat_'.$subcat->subcat_id.'" class="form-control" name="BookCategory[subcat]['.$subcat->subcat_id.']" maxlength="225" aria-invalid="false" type="text" value="' . $subcat->subcat_name . '"></div><div class="col-sm-1"><button type="button" id="'.$subcat->subcat_id.'" class="btn btn-xs rmv_subcat_input"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div>';
                echo '<div id="help-block_'.$subcat->subcat_id.'" class="help-block"></div>';
                //echo $form->field($model, 'subcat')->textInput(['maxlength' => true]);
            endforeach;
            echo '</div>';
            echo '</div>';  //class="col-sm-10"
            echo '<div class="col-sm-2"><div><button type="button" id="update_add_subcat" class="btn btn-info btn-xs"><i class="fa fa-plus-square-o " aria-hidden="true"></i> Προσθήκη</button></div></div>';
            echo '</div>';
            echo '<div class="row"><div class="col-sm-10">';
            echo '<div id="add_inputs_container"></div>';
            echo '</div>';
            echo '</div>';
        }else{
            echo '<div class="row"><div class="col-sm-10">';
            echo $form->field($model,'subcat')->textInput(['maxlength' => true,],['options'=>['class'=>'col-sm-11']]);
            echo "</div>";  //col-10
            echo '<div class="col-sm-2"><div><button type="button" id="update_add_subcat" class="btn btn-info btn-xs"><i class="fa fa-plus-square-o " aria-hidden="true"></i> Προσθήκη</button></div></div>';
            echo "</div>"; //row
            echo '<div class="row"><div class="col-sm-10">';
            echo '<div id="add_inputs_container"></div>';
            echo '</div>';
            echo '</div>';
        }

    }

    ?>

    <div class="form-group">
<!--        Html::submitButton($model->isNewRecord ? 'Προσθήκη' : 'Αποθήκευση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])-->
        <?php
        if($model->isNewRecord ){
        echo Html::submitButton('Δημιουργία', ['class' =>  'btn btn-success', 'id'=>'btn_cat_create']);
        }else{
        echo Html::submitButton('Αποθήκευση', ['class' =>  'btn btn-primary', 'id'=>'btn_cat_update']);
        }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
