<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'usr_name') ?>

    <?= $form->field($model, 'user_surname') ?>

    <?= $form->field($model, 'usr_phone') ?>

    <?= $form->field($model, 'usr_email') ?>

    <?php // echo $form->field($model, 'usr_address') ?>

    <?php // echo $form->field($model, 'usr_city') ?>

    <?php // echo $form->field($model, 'usr_pcode') ?>

    <?php // echo $form->field($model, 'order_bk_id') ?>

    <?php // echo $form->field($model, 'order_date') ?>

    <?php // echo $form->field($model, 'order_comment') ?>

    <?php // echo $form->field($model, 'order_complete') ?>

    <?php // echo $form->field($model, 'order_admin_comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
