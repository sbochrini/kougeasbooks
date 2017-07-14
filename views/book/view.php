<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
//$author_name=$author->auth_name;
//echo $model->bkAuthor->auth_name;
$this->title = $model->bk_title;
$this->params['breadcrumbs'][] = ['label' => 'Βιβλία', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">
    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <p>
        <?= Html::a('Επεξεργασία', ['update', 'id' => $model->bk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Διαγραφή', ['delete', 'id' => $model->bk_id, 'view'=>1], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Διαγραφή βιβλίου;',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row col-sm-12">
        <div class="col-sm-4">
            <?php
            if ($model->bk_image_web_filename!='') {
                echo '<br /><p><img class="img-rounded" src="'.Yii::$app->homeUrl. '/img/'.$model->bk_image_web_filename.'" style="max-width:250px;" alt=""></p>';
            }else{
                echo '<br /><p><img class="img-rounded" src="'.Yii::$app->homeUrl. '/pictures/no_image.jpg" style="max-width:250px;" alt=""></p>';
            }
            ?>
        </div>
        <div class="col-sm-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'bk_id',
                    'bk_title',
                    //'bkAuthor.auth_name',
                    [
                        'label'=>'Συγγραφέας',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_author_id=="" || is_null($model->bk_author_id)){
                                return "<span class='not-set'>Δεν έχει οριστεί.</span>";
                            }else{
                                return $model->bkAuthor['auth_name'];
                            }
                        },
                    ],
                    'bkCat.cat_name',
                   // 'bkSubcat.subcat_name',
                    [
                        'label'=>'Υποκατηγορία',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_subcat_id=="" || is_null($model->bk_subcat_id)){
                                return "<span class='not-set'>Δεν υπάρχει υποκατηγορία.</span>";
                            }else{
                                return $model->bkSubcat['subcat_name'];
                            }
                        },
                    ],
                   // 'bk_publisher',
                    [
                        'label'=>'Εκδότης',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_publisher=="" || is_null($model->bk_publisher)){
                                return "<span class='not-set'>Δεν έχει οριστεί.</span>";
                            }else{
                                return $model->bk_publisher;
                            }
                        },
                    ],
                   // 'bk_pb_place',
                    [
                        'label'=>'Τόπος Έκδοσης',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_pb_place=="" || is_null($model->bk_pb_place)){
                                return "<span class='not-set'>Δεν έχει οριστεί.</span>";
                            }else{
                                return $model->bk_pb_place;
                            }
                        },
                    ],
                    //'bk_pb_year',
                    [
                        'label'=>'Ετος Έκδοσης',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_pb_year=="" || is_null($model->bk_pb_year)){
                                return "<span class='not-set'>Δεν έχει οριστεί.</span>";
                            }else{
                                return $model->bk_pb_year;
                            }
                        },
                    ],
                   // 'bk_pages',
                    [
                        'label'=>'Σελίδες',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_pages=="" || is_null($model->bk_pages)){
                                return "<span class='not-set'>Δεν έχει οριστεί.</span>";
                            }else{
                                return $model->bk_pages;
                            }
                        },
                    ],
                    //'bk_price',
                    [
                        'label'=>'Τιμή',
                        'format' => 'html',
                        'value' => function($model){
                            if($model->bk_price=="" || is_null($model->bk_price)){
                                return "<span class='not-set'>Μη διαθέσιμο.</span>";
                            }else{
                                return $model->bk_price;
                            }
                        },
                    ],
                    'bk_description',
                    'bk_condition:ntext',
                    'bk_grouping',
                   // 'bk_image_web_filename',
                   // 'bk_image_src_filename',
                ],
            ])
            ?>
        </div>
    </div>


</div>
