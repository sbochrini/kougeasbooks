<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBookCategoery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Κατηγορίες';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-category-index">

    <div class="page-header">
        <div class="row">
            <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
            <?php echo '<div class="col-md-6"><div class="pull-right"> <h3>'.Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Προσθήκη κατηγορίας', ['create'], ['class' => 'btn btn-info']).'</h3></div></div>'; ?>
        </div>
    </div>
<?php //print_r($html)?>
    <div class="row">
        <div class="col-sm-8">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => "Εμφάνιση {begin} - {end} από {totalCount} κατηγορίες.",
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'cat_id',
                    'cat_name',
                    [
                        'label'=>'Υποκατηγορία',
                        'attribute' => 'cat_subcat',
                        'format'=>'raw',
                        'value' => function($data, $popover) use ($html){
                            if($data->cat_subcat==1){
                                $popover=$html[$data->cat_id];
                                return '<a href="#" data-trigger="hover" data-toggle="popover" data-content="'.$popover.'"><i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i></a>';
                                //return Html::tag('a','<i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i>', ['data-toggle'=>'popover','data-trigger'=>'hover','data-html'=>true,'data-content'=>"ojo",'style'=>'cursor:pointer;']);
                            }else{
                               return "";
                            }
                            //return $value;
                        },
                        'contentOptions'=>['style'=>'text-align: center;']
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'delete' => function($url, $model){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->cat_id], [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => 'Ειστε σίγουρος ότι θέλετε να διαγράψετε την κατηγορία: '.$model->cat_name.';',
                                        'method' => 'post',
                                    ],
                                ]);
                            }
                        ],
                        'contentOptions'=>['style'=>'text-align: center;']],
                ],
            ]); ?>
        </div>
        <div class="col-sm-4"></div>
        <?php
       /* echo 'Testing for ' . Html::tag('span', 'popover', [
        'data-title'=>'Heading',
        'data-content'=>'This is the content for the popover',
        'data-toggle'=>'popover',
        'style'=>'text-decoration: underline; cursor:pointer;'
        ]);*/
?>
    </div>
</div>

