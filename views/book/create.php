<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Προσθήκη βιβλίου';
$this->params['breadcrumbs'][] = ['label' => 'Βιβλία', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'author'=>$author,
        'categoryList' => $categoryList,
        'subcategoryList'=>$subcategoryList,
       // 'array_cats_with_subs'=>$array_cats_with_subs,
      //  'array_cats_with_subs_ids'=>$array_cats_with_subs_ids,
    ]) ?>

</div>
