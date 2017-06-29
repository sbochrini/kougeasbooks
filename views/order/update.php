<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Επεξεργασία Παραγγελίας: ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Παραγγελίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Παραγγελία ".$model->order_id, 'url' => ['view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = 'Επεξεργασία';
?>
<div class="order-update">
    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'book' => $book,
        'book_items'=>$book_items,
    ]) ?>

</div>
