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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Επεξεργασία', ['update', 'id' => $model->bk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Διαγραφή', ['delete', 'id' => $model->bk_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Είστε σίγουρος ότι θέλετε να σβήσετε το παρόν βιβλίο;',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row col-sm-12">
        <div class="col-sm-4">
            <?php
            if ($model->bk_image_web_filename!='') {
                echo '<br /><p><img src="'.Yii::$app->homeUrl. '/img/'.$model->bk_image_web_filename.'"></p>';
            }
            ?>
        </div>
        <div class="col-sm-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'bk_id',
                    'bk_title',
                    'bkAuthor.auth_name',
                    'bkCat.cat_name',
                    'bkSubcat.subcat_name',
                   // 'bk_author_id',
                    //'bk_cat_id',
                    'bk_publisher',
                    'bk_pb_place',
                    'bk_pb_year',
                    'bk_pages',
                    'bk_price',
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
