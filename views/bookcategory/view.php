<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BookCategory */

$this->title = $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => 'Κατηγορίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->cat_name;
?>
<div class="book-category-view">

    <div class="page-header">
        <div class="row">
            <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
        </div>
    </div>

    <p>
        <?= Html::a('Επεξεργασία', ['update', 'id' => $model->cat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Δαγραφή', ['delete', 'id' => $model->cat_id, 'view'=>1], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Διαγραφή κατηγορίας;',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-sm-6">
            <?= DetailView::widget([
                'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}</td></tr>",
                'model' => $model,
                'attributes' => [
                    //'cat_id',
                    'cat_name',
                    [
                        'label'=>'Υποκατηγορίες',
                        'format' => 'html',
                        'value' => function($model,$subcatitems) use ($subcat_items){
                            if($model->cat_subcat==0){
                                return "<span class='not-set'>Δεν υπάρχουν υποκατηγορίες.</span>";
                            }else{
                                return implode('<br>',$subcatitems);
                            }
                        },
                    ]
                ],
            ]) ?>
        </div> <!--col-6-->
    </div> <!--row-->

</div>
