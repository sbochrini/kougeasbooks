<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Επεξεργασία βιβλίου: ' . $model->bk_title;
$this->params['breadcrumbs'][] = ['label' => 'Βιβλία', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bk_title, 'url' => ['view', 'id' => $model->bk_id]];
$this->params['breadcrumbs'][] = 'Επεξεργασία';
?>
<div class="book-update">
    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'author' => $author,
        'categoryList' => $categoryList,
        'subcategoryList'=>$subcategoryList,
    ]) ?>

</div>
