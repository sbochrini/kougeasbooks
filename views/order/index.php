<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\assets\BootstrapSwitchAsset;

BootstrapSwitchAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Παραγγελίες';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <div class="row">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
        <?php echo '<div class="col-md-6"><div class="pull-right"> <h3>'.Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nέα Παραγγελία', ['create'], ['class' => 'btn btn-info']).'</h3></div></div>'; ?>
    </div>
</div>
<div class="order-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Εμφάνιση {begin} - {end} από {totalCount} παραγγελίες.",
        'emptyText' => 'Δεν υπάρχουν αποτελεσματα!',
        'rowOptions'=>function($model){
        if($model->order_complete==0){
            return ['class' => 'alert alert-danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'order_id',
            [
                'attribute'=>'order_date',
                'value'=>function($model){return Yii::$app->formatter->asDate($model->order_date,'php:d-m-Y');},
            ],
            [
                'label'=>'Βιβλίο',
                'attribute' => 'order_book',
                'value'=>'orderBk.bk_title',
            ],
            'usr_name',
            'usr_surname',
            'usr_phone',
            //'usr_email:email',
            // 'usr_address',
            // 'usr_city',
            // 'usr_pcode',
            // 'order_comment',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {comment}',
                'buttons' => [
                    'comment' => function ($url, $model, $key) {
                        return  '<a id="'.$model->order_id.'" data-toggle="modal" href="#admincommentModalindex"><i class="fa fa-comment-o fa-lg" aria-hidden="true"></i></a>';
                           // Html::tag('a','<i class="fa fa-comment-o fa-lg" aria-hidden="true"></i>', ['admincomment', 'id'=>$model->order_id]);
                    },
                ],
                'contentOptions'=>['style'=>'text-align: center;']
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{active}',
                'buttons' => [
                    'active' => function ($url, $model, $key) {
                        if($model->order_complete==0){
                            return '<input id="'.$model->order_id.'" class="toggle-event" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" type="checkbox" data-on="Ολοκληρωμένη" data-off="Σε αναμονή" data-size="mini" data-style="ios">';
                        }else{
                            return '<input id="'.$model->order_id.'" class="toggle-event" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" type="checkbox" data-on="Ολοκληρωμένη" data-off="Σε αναμονή" data-size="mini" data-style="ios">';
                        }
                    },
                ],
                'contentOptions'=>['style'=>'text-align: center; font-size: 8px;']
            ],
        ],
        'tableOptions' => ['class' => 'table table-hover  table-bordered'],
    ]); ?>
</div>
<div class="fetched-data"></div>
<!-- Modal -->
<div class="modal fade" id="admincommentModalindex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <!--modal-content -->
        </div>
    </div>
</div>