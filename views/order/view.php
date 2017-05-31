<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->orderBk['bk_title'];
$this->params['breadcrumbs'][] = ['label' => 'Παραγγελίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row col-sm-8">
    <div class="order-view">

        <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

        <p>
            <?= Html::a('Επεξεργασία', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
            <!--<a id="btn_add_admin_comment"  class="btn btn-warning" data-toggle="modal" href="#admincommentModal">
                Προσθήκη σχόλιου
            </a>-->
            <a data-toggle="modal" href="#admincommentModal" class="btn btn-warning btn-large">Προσθήκη σχόλιου</a>
            <?= Html::a('Διαγραφή', ['delete', 'id' => $model->order_id, 'view'=>1], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Είστε σίγουρος ότι θέλετε να διαγράψετε την παραγγελία;',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php
     if($model->order_complete==0){
         echo'<div class="alert alert-danger" role="alert">Η παραγγελία βρίσκεται σε αναμονή!</div>';
     }else{
         echo '<div class="alert alert-success" role="alert">Η παραγγελία έχει ολοκληρωθεί!</div>';
     }
    ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'order_id',
                [
                    'attribute'=>'order_date',
                    'value'=>Yii::$app->formatter->asDate($model->order_date,'php:d-m-Y'),
                ],
                'usr_name',
                'usr_surname',
                'usr_phone',
                'usr_email:email',
                'usr_address',
                'usr_city',
                'usr_pcode',
                'orderBk.bk_title',
               // 'order_comment',
                [
                    'label'=>'Σχόλιο χρήστη',
                    'format' => 'html',
                    'value' => function($model){
                        if($model->order_comment=="" || is_null($model->order_comment)){
                            return "<span class='not-set'>Δεν υπάρχουν σχόλια.</span>";
                        }else{
                            return $model->order_comment;
                        }
                    },
                ],
               // 'order_admin_comment',
                [
                    'label'=>'Σχόλιο διαχειριστή',
                    'format' => 'html',
                    'value' => function($model){
                        if($model->order_admin_comment=="" || is_null($model->order_admin_comment)){
                            return "<span class='not-set'>Δεν υπάρχουν σχόλια.</span>";
                        }else{
                            return $model->order_admin_comment;
                        }
                    },
                ],
            ],
        ]) ?>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="admincommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Προσθήκη σχόλιου</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data'],
                'id' => 'admin_comment_form',
                'action'=>Url::to(['order/admincomment', 'id'=>$model->order_id]),
                //'name'=>'book_form'
            ]);
            ?>
                <div class="modal-body">
                    <?= $form->field($model, 'order_admin_comment')->textArea(['rows' => 3]) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Αποθήκευση</button>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
