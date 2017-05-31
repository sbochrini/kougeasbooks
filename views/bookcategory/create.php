<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BookCategory */

$this->title = 'Δημιουργία νέας κατηγορίας';
$this->params['breadcrumbs'][] = ['label' => 'Κατηγορίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-category-create">

    <div class="page-header">
        <div class="row">
            <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <?= $this->render('_form', [
                'model' => $model,
                'subcat'=>$subcat,
            ]) ?>
        </div>
    </div>
</div>
