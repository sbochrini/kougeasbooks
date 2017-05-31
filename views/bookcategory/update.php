<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookCategory */

$this->title = 'Επεξεργασία Κατηγορίας: ' . $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => 'Κατηγορίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_name, 'url' => ['view', 'id' => $model->cat_id]];
$this->params['breadcrumbs'][] = 'Επεξεργασία';
?>
<div class="book-category-update">

    <div class="page-header">
        <div class="row">
            <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $this->render('_form', [
                'model' => $model,
                'subcats'=>$subcats,
            ]) ?>
        </div>
    </div>
</div>
