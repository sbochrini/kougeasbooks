<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bk_id') ?>

    <?= $form->field($model, 'bk_title') ?>

    <?= $form->field($model, 'bk_author_id') ?>

    <?= $form->field($model, 'bk_cat_id') ?>

    <?= $form->field($model, 'bk_publisher') ?>

    <?php // echo $form->field($model, 'bk_pb_place') ?>

    <?php // echo $form->field($model, 'bk_pb_year') ?>

    <?php // echo $form->field($model, 'bk_pages') ?>

    <?php // echo $form->field($model, 'bk_price') ?>

    <?php // echo $form->field($model, 'bk_condition') ?>

    <?php // echo $form->field($model, 'bk_grouping') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
