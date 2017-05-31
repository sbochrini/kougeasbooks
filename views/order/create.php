<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Νέα παραγγελία';
$this->params['breadcrumbs'][] = ['label' => 'Παραγγελίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'book' => $book,
        'book_items'=>$book_items,
    ]) ?>

</div>
